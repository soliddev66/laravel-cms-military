@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_slider') }}</h4>
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slider_image">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 1080) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="slider_image" class="form-control-file" id="slider_image" required>
                                    <small id="slider_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Sliders row -->
   @if (count($sliders) > 0)
       <div class="row">
           <div class="col-12 box-margin">
               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title">{{ __('content.sliders') }}</h5>
                       <div class="row text-center">
                          @foreach ($sliders as $slider)
                               <div class="col-sm-6 col-xl-3">
                                   <a href="{{ asset('uploads/creative/img/sliders/'.$slider->slider_image) }}" data-lightbox="example-set">
                                       <img src="{{ asset('uploads/creative/img/sliders/'.$slider->slider_image) }}" class="img-fluid mb-30" alt="slider image">
                                   </a>
                                  <div>
                                      <a href="{{ route('slider.edit', $slider->id) }}" class="mr-2">
                                          <i class="fa fa-edit text-info font-18"></i>
                                      </a>
                                      <a href="#" data-toggle="modal" data-target="#deleteModel{{ $slider->id }}">
                                          <i class="fa fa-trash text-danger font-18"></i>
                                      </a>
                                          <!-- Modal -->
                                          <div class="modal fade" id="deleteModel{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body text-center">
                                                          {{ __('content.you_wont_be_able_to_revert_this') }}
                                                      </div>
                                                      <div class="modal-footer">
                                                          <form class="d-inline-block" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                              @method('DELETE')
                                                              @csrf
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                          <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                               </div>
                              @endforeach
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endif
    <!-- end row -->

@endsection