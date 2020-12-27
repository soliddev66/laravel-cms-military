@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.add_gallery') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#gallerySectionModal">{{ __('content.section_title') }}</button>
                        </div>
                    </div>
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="gallery_image">{{ __('content.image') }} ({{ __('content.size') }} 600 x 650) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="gallery_image" class="form-control-file" id="gallery_image" required>
                                    <small id="gallery_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
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
    </div>
    <!-- end row -->

    <!-- Sliders row -->
   @if (count($galleries) > 0)
       <div class="row">
           <div class="col-12 box-margin">
               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title">{{ __('content.galleries') }}</h5>
                       <div class="row text-center">
                          @foreach ($galleries as $gallery)
                               <div class="col-sm-6 col-xl-3 mb-4">
                                   <a href="{{ asset('uploads/creative/img/galleries/'.$gallery->gallery_image) }}" data-lightbox="example-set">
                                       <img src="{{ asset('uploads/creative/img/galleries/'.$gallery->gallery_image) }}" class="img-fluid mb-30" alt="gallery image">
                                   </a>
                                  <div>
                                      <a href="{{ route('gallery.edit', $gallery->id) }}" class="mr-2">
                                          <i class="fa fa-edit text-info font-18"></i>
                                      </a>
                                      <a href="#" data-toggle="modal" data-target="#deleteModel{{ $gallery->id }}">
                                          <i class="fa fa-trash text-danger font-18"></i>
                                      </a>
                                          <!-- Modal -->
                                          <div class="modal fade" id="deleteModel{{ $gallery->id }}" tabindex="-1" role="dialog">
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
                                                          <form class="d-inline-block" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                                              @csrf
                                                              @method('DELETE')
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
    <div class="modal fade" id="gallerySectionModal" tabindex="-1" role="dialog" aria-labelledby="gallerySectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="testimonialModalLabel">{{ __('content.section_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($gallery_section))
                        <form action="{{ route('gallery-section.update', $gallery_section->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $gallery_section->title }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    @else
                        <form action="{{ route('gallery-section.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection