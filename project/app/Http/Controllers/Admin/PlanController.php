<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Http\Request;
use Datatables;

class PlanController extends Controller
{
    public $service;
    public function __construct(PlanService $planService)
    {
        $this->middleware('auth:admin');
        $this->service = $planService;
    }

    public function datatables()
    {
         $datas = Plan::orderBy('id','desc')->get();

         return Datatables::of($datas)
                            ->addColumn('checkbox',function(Plan $data){
                                return $checkbox = $data->id ? '<input type="checkbox" class="form-check-input m-0 p-0 columnCheck" value="'.$data->id.'">':'';
                            })
                            ->editColumn('price', function(Plan $data) {
                                return showAdminAmount($data->price);
                            })
                            ->editColumn('post_duration', function(Plan $data) {
                                return $data->post_duration.' Days';
                            })
                            ->addColumn('status', function(Plan $data) {
                                $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                                $status_sign = $data->status == 1 ? 'success'   : 'danger';

                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.$status .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.plans.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.plans.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                                </div>
                            </div>';

                            })
                            ->addColumn('action', function(Plan $data) {

                                return '<div class="btn-group mb-1">
                                  <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.'Actions' .'
                                  </button>
                                  <div class="dropdown-menu" x-placement="bottom-start">
                                    <a href="' . route('admin.plans.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.plans.delete',$data->id).'">'.__("Delete").'</a>
                                  </div>
                                </div>';

                              })
                            ->rawColumns(['checkbox','status','action'])
                            ->toJson();
    }

    public function index()
    {
        return view('admin.plans.index');
    }

    public function create()
    {
        $data['currency'] = defaultCurrency();
        return view('admin.plans.create',$data);
    }

    public function store(PlanRequest $request)
    {
        $this->service->store($request->all());

        $msg = 'New Data Added Successfully.'.' '.'<a href="'.route('admin.plans.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data['data'] = Plan::findOrFail($id);
        $data['currency'] = defaultCurrency();
        $data['attributes'] = $data['data']->attribute != NULL ? json_decode($data['data']->attribute,true) : [];

        return view('admin.plans.edit',$data);
    }

    public function update(PlanRequest $request, $id)
    {
        $this->service->update($request->all(),$id);

        $msg = 'Data Updated Successfully.'.' '.'<a href="'.route('admin.plans.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function status($id1,$id2)
    {
        $this->service->status($id1,$id1);

        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }

    public function bulkdelete(Request $request){
        $this->service->bulkdelete($request->bulk_id);

        return response()->json("Data Deleted Successfully");
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }
}
