<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Card extends Base
{
    public function list()
    {
        //查询出卡密列表
        $list=db('card')
            ->alias('a')
            ->join('goods c','a.gid=c.id')
            ->field('a.*,c.goodname')
            ->paginate(10);
        //赋值给面板
        $this->assign([
            'list'=>$list,
        ]);    
        return view();
    }

    public function add()
    {
        //查询商品分类列表
        $type=db('type')
             ->select();
        //赋值给面板
        $this->assign([
            'type'=>$type,
        ]);

        //如果有提交执行添加操作
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');
            //如果goods字段为空说明没有选择属于哪个商品
            if($data['goods']==''){
                $this->error('未选择所属商品');
            }
            //将提交的卡密字段 清除两侧多余字符串
            $card=trim(input('card'));
            //将提交的卡密 以换行分隔成数组
            $cardarr = explode("\r\n", $card);

            //循环卡密数组
            foreach($cardarr as $k =>$v){
                //如果卡密不为空 将卡密排列成一个二维数组
                if($v != ''){
                    $cardlist[$k]['gid']=$data['goods'];
                    $cardlist[$k]['card']=$v;
                    $cardlist[$k]['addtime']=time();

                }
            }
            //进行写入工作
            $addcard=db('card')
                    ->insertAll($cardlist);
            //判断是否添加成功
            if($addcard){
                //先查询出此商品现在库存
                $oldcount=db('goods')
                        ->where('id',$data['goods'])
                        ->find();
                //旧的库存数量加上现在新增的数量的就是总共的库存
                $count=$oldcount['goodcount']+$addcard;
                //执行增加库存操作
                db('goods')
                ->where('id',$data['goods'])
                ->setField('goodcount',$count);
                $this->success('添加卡密成功','admin/card/list');
            }else{
                $this->error('添加卡密失败');
            }
            
        }
        return view();
    }

    public function del(){
        //接收需要删除的id
        $id=input('id');

        //根据卡id查询出所属卡信息
        $card=db('card')
            ->find($id);

        //进行删除操作
        if($card['status'] == 1){

            //如果是已出售的卡密 直接删除就好 不用减库存
            $del=db('card')
                ->delete($id);
            //判断是否删除成功
            if($del){
                $this->success('删除卡密成功','admin/card/list');
            }else{
                $this->error('删除卡密失败');
            }


        }else{
            //如果是未出售的卡密 需要删除并减少库存
            $del=db('card')
                ->delete($id);
            //判断是否删除成功
            if($del){
                //删除成功的话就库存减一
                db('goods')
                ->where('id',$card['gid'])
                ->setDec('goodcount');
                $this->success('删除卡密成功','admin/card/list');
            }else{
                $this->error('删除卡密失败');
            }
        }
    }

    public function delall(){
        //接收数据
        $ids=input('param.');
        //将接收到的二维数组提出来变成一维数组
        $id=$ids['cardid'];
        //获取需要删除的卡密数量
        $delnum=count($id);
        //定义一个变量用于接收删除成功数
        $delcount=0;

        foreach($id as $k=>$v){
            //接收需要删除的id
            $id=$v;

            //根据卡id查询出所属卡信息
            $card=db('card')
                ->find($id);
            
                //进行删除操作
            if($card['status'] == 1){

                //如果是已出售的卡密 直接删除就好 不用减库存
                $del=db('card')
                    ->delete($id);
                //判断是否删除成功
                if($del){
                    $delcount=$delcount+1;
                }


            }else{
                //如果是未出售的卡密 需要删除并减少库存
                $del=db('card')
                    ->delete($id);
                //判断是否删除成功
                if($del){
                    //删除成功的话就库存减一
                    db('goods')
                    ->where('id',$card['gid'])
                    ->setDec('goodcount');
                    $delcount=$delcount+1;
                }
            }

        }

        //判断是否成功
        if($delnum==$delcount){
            $this->success('批量删除卡密成功','admin/card/list');
        }else{
            $this->error('批量删除卡密失败');
        }
       
    }

    //页面查询商品接口
    public function getgoods(){
        //接收商品分类id
        $type_id=input('type_id');
        //查询出所有自动发卡的商品
        $goods=db('goods')
                ->where('typeid',$type_id)
                ->where('goodship',0)
                ->select();
        return json($goods);
    }
}
