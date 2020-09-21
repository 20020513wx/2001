<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GoodsController extends Controller
{
    //商品列表
    public function index(Request $request){
        $goods_name = $request->goods_name;
        $where = [];
        if($goods_name){
            $where[] = ['goods_name','like',"%$goods_name%"];
        }
        $data = Goods::leftjoin('brand','goods.brand_id','=','brand.brand_id')->leftjoin('category','category.cate_id','=','goods.cate_id')->where('goods.is_del',1)->where($where)->orderBy('goods_id','desc')->paginate(4);

        //相册
        foreach($data as $k=>$v){
            $data[$k]['goods_imgs']=explode('|',$v['goods_imgs']);
        }
        if($request->ajax()){
            return view('admin.goods.goodspage',['data'=>$data,'goods'=>$request->all()]);
        }
        return view("admin.goods.index",['data'=>$data,'goods'=>$request->all()]);
    }
    //商品添加
    public function create(){
        $brand_data = Brand::get();
        $cate_data = DB::table('category')->get();
        $cate_info = $this->list_level($cate_data);
        return view("admin.goods.create",['brand_data'=>$brand_data,'cate_info'=>$cate_info]);
    }
    public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
    {
        static $array=[];
        foreach($data as $k=>$v){
            if($pid==$v->parent_id){
                $v->level=$level;
                $array[]=$v;
                self::list_level($data,$v->cate_id,$level+1);
            }
        }
        return $array;
    }
    //执行添加
    public function store(Request $request){
        $data = $request->except(['_token']);
        $request->validate([
            'goods_name' => 'required|unique:goods',
            'goods_price' => 'required',
            'goods_num' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格不能为空',
            'goods_num.required'=>'商品数量不能为空',
            'cate_id.required'=>'商品分类不能为空',
            'brand_id.required'=>'商品品牌不能为空',
        ]);
//        dd($data['goods_imgs']);
        if (isset($data['goods_imgs'])) {
            $photos=$data['goods_imgs'];
            $data['goods_imgs']=implode('|',$photos);
        }
//        dd($data);
        $res = Goods::create($data);
        if($res){
            return redirect('/admin/goods/index');
        }
    }
    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $goods_id = $request->goods_id;
        $res = Goods::where('goods_id',$goods_id)->update(['is_del'=>2]);
        if($res){
            return json_encode(['code'=>00000,'msg'=>'删除成功','url'=>'/admin/goods/index']);
        }else{
            return json_encode(['code'=>00001,'msg'=>'删除失败','url'=>'/admin/goods/index']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand_data = Brand::get();
        $data = Goods::find($id);
        $cate_data = DB::table('category')->get();
        $cate_info = $this->list_level($cate_data);
//        dd($data['goods_imgs']);
//        dd($data);
        return view('admin.goods.edit',['data'=>$data,'brand_data'=>$brand_data,'cate_info'=>$cate_info]);
    }

    /**
     * Update the specified resource in storage.
     *执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $request->except('_token');
        $request->validate([
            'goods_name' =>
                [
                    'required',
                    Rule::unique('goods')->ignore(request()->goods_id,'goods_id')
                ],
            'goods_price' => 'required',
            'goods_num' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格不能为空',
            'goods_num.required'=>'商品数量不能为空',
            'cate_id.required'=>'商品分类不能为空',
            'brand_id.required'=>'商品品牌不能为空',
        ]);
//        dd($data);
        if(is_array($data['goods_imgs'])){
            if(isset($data['goods_imgs'])){
                $photos=$data['goods_imgs'];
                $data['goods_imgs']=implode('|',$photos);
            }
        }

//        dd($data);
        $res = Goods::where('goods_id',$id)->update($data);
        if($res!==false){
            return redirect('/admin/goods/index');
        }else{
            return redirect('admin/goods/edit/'.$id);
        }
    }

    //文件上传
    public function uploads(Request $request){
        //接收值
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file;
            //        dd($file);
            $store_result ='/upload/'.$file->store('goods_upload');
            return json_encode(['code'=>00000,'msg'=>'上传成功','store_result'=>$store_result]);
        }
        return json_encode(['code'=>00001,'msg'=>'上传失败']);
    }
    //主页
    public function main(){
        return view("admin.goods.main");
    }
}
