@extends('layouts.dashboard')

@section('content')

<div class="card card-solid">
  <div class="card-header p-1 border-bottom-0">
    <div class="row d-flex align-items-stretch">

      <div class="col-12 col-sm-5 col-md-5  d-flex align-items-stretch mb-1">
        <select class="custom-select custom-select-sm" id="orderStatus">

          <option value="all">@lang('site.dashboard_all_orders')</option>
          @foreach (config('orderStatus') as $orderStatus)
          <option value="{{ $orderStatus }}" "@if ($orderStatus == $status) selected @endif">@lang('site.order_status_'
            . $orderStatus)</option>
          @endforeach
        </select>
      </div>
      <div class="col-8 col-sm-5 col-md-5">
        <form action="{{ route('order.index' , $_SERVER['QUERY_STRING']) }}" method="GET">
          <div class="input-group input-group-sm">
            <input type="text" name="search" value="" placeholder="@lang('site.search_placeholder')"
              class="form-control">
            <span class="input-group-append">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
      <div class="col-4 col-sm-2 col-md-2">
        <div class="float-right">
          <a href="{{ route('order.index' , ['view' => 'list']) }}"
            class="btn btn-sm @if($view =='list') btn-primary @endif">
            <i class="fas fa-bars"></i>
          </a>
          <a href="{{ route('order.index' , ['view' => 'grid']) }}"
            class="btn btn-sm @if($view =='grid') btn-primary @endif">
            <i class="fas fa-th"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--card-header-->
  @if($orders->count())
  <div class="card-body p-1">
    @if($view =='grid')
    <div class="row d-flex align-items-stretch">
      @foreach($orders as $index => $order)
      <div class="col-12 col-sm-6 col-md-4  d-flex align-items-stretch">
        <div class="card bg-light w-100 card-outline card-{{ __('site.color_' . $order->status) }}">
          <div class="card-body pt-0 mb-0 pb-1 p-0">
            <table class="table text-nowrap align-items-stretch table-sm">
              <tbody>
                <tr>
                  <td class="border-top-0">@lang('datatable.order.customer.created_at')</td>
                  <td class="border-top-0">
                    <strong>
                      {{ $order->getDate() }}
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.reciver')</td>
                  <td>
                    <strong>
                      {{ $order->fullname ?? '' }}
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.phone')</td>
                  <td>
                    <strong>
                      {{ $order->phone ?? ''  }}
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.city')</td>
                  <td>
                    <strong>
                      {{$order->getCityName() ?? ''}}
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.status')</td>
                  <td>
                    <span class="badge p-2 bg-{{ __('site.color_' . $order->status)}}">
                      {{ $order->getStatus() ?? '' }}
                    </span>

                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.total_price')</td>
                  <td>
                    <strong>
                      {{$order->price ?? 0}}
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td>@lang('datatable.order.customer.order_num')</td>
                  <td>
                    <strong>
                      {{ $order->order_num ?? 0 }}
                    </strong>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="text-center mt-3 mb-0">
              <div class="btn-group btn-group-sm">
                <x-show-button ability="admin_show" route="order.show" id="{{ $order->id ?? 1 }}" />
                @if($order->status != 'delivered')
                <x-edit-button ability="order_edit" route="order.edit" id="{{ $order->id ?? 1}}" />
                <x-delete-button ability="order_destroy" route="order.destroy" id="{{ $order->id ?? 1}}" />
                @endif
              </div>
            </div>
          </div>
        </div><!-- end of card-->
      </div>
      @endforeach
    </div>
    @else
    <div class="table-responsive p-0">
      <table class="table table-head-fixed table-bordered text-nowrap text-center table-sm">
        <thead>
          <tr>
            <th> # </th>
            @foreach (trans('datatable.order.customer') as $column =>$val)
            <th>{{trans('datatable.order.customer.' . $column)}}</th>
            @endforeach
            <th>@lang('site.actions')</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $index => $order)
          <tr>
            <td class="sorting_1" tabindex="0">{{ $orders->firstItem()+$index }}</td>
            <td class="font-weight-bold"> {{ $order->fullname??'' }} </td>
            <td> {{ $order->getDate()}} </td>
            <td> {{ $order->getCityName() }} </td>
            <td> {{ $order->phone??'' }} </td>
            <td class="font-weight-bold"> {{ $order->price??''  }}</td>
            <td>
              <span class="badge w-100 p-2 bg-{{ __('site.color_' . $order->status)}}">
                {{ $order->getStatus() ?? '' }}
              </span>
            </td>
            <td class="font-weight-bold"> {{ $order->order_num ??0 }}</td>
            <td>
              <div class="btn-group btn-group-sm">
                <x-show-button ability="admin_show" route="order.show" id="{{ $order->id }}" />
                <x-edit-button ability="order_edit" route="order.edit" id="{{ $order->id }}" />
                <x-delete-button ability="order_destroy" route="order.destroy" id="{{ $order->id }}" />
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <nav aria-label="Contacts Page Navigation">
      <ul class="pagination justify-content-center m-0">
        {{ $orders->appends(['view' => $view ,'status'=>$status??'all' , 'search'=> $search])->links() }}
      </ul>
    </nav>
  </div>
  <!-- /.card-footer -->
  @else
  <div class="m-3">
    <x-empty-records-button-add route="order.create" />
  </div>
  @endif
</div>
@endsection