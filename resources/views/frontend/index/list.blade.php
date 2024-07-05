@foreach($categories as $category)
    <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
        @if(request()->language=='en')
        {{ $category->title_en }}
        @else
            {{ $category->title }}
        @endif
            <h6 class="content_title"><span class="pull-right"></span></h6>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($category->documentCategories as $subcategory)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$loop->first ? 'active': ''}}"
                        id="{{ \Illuminate\Support\Str::slug($subcategory->title,'-') }}-tab"
                        data-bs-toggle="tab" data-bs-target="#{{ \Illuminate\Support\Str::slug($subcategory->title,'-') }}"
                        type="button" role="tab" aria-controls="{{ \Illuminate\Support\Str::slug($subcategory->title,'-') }}"
                        @if($loop->first)aria-selected="true" @endif>
                    @if(request()->language=='en')
                    {{ $subcategory->title_en }}
                    @else
                        {{ $subcategory->title }}
                    @endif
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content list-content" id="myTabContent">
        @forelse($category->documentCategories as $subcategoryData)
            <div class="tab-pane fade {{$loop->first ? 'show active': ''}}"
                 id="{{ \Illuminate\Support\Str::slug($subcategoryData->title,'-') }}"
                 role="tabpanel" aria-labelledby="{{ \Illuminate\Support\Str::slug($subcategoryData->title,'-') }}-tab">
                <table class="table table-striped">
                    <thead>
                    <tr class="table-head">
                        <th></th>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Published Date')}}</th>
                        <th>{{__('Download')}}</th>
                    </tr>
                    @foreach($subcategoryData->documents->take(3) as $document)
                        <tr>
                            <td><img src="{{asset('images/image.png')}}"
                                     width="30" alt=""></td>
                            <td>
                                @if(request()->language=='en')
                                {{$document -> title_en}}
                                @else
                                    {{$document -> title}}
                                @endif
                            </td>
                            <td>{{$document -> published_date}}</td>
                            <td>
                                <a href="{{route('documentDetail',[$document->slug,'language'=>$language])}}">
                                    <i class="fa fa-download btn btn-primary btn-xs"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>
                <div class="text-right mb-3">
                    <a class="btn btn-danger btn-sm"
                       href="{{route('documentCategory',[$subcategoryData->slug,'language'=>$language])}}">
                        {{__('View More')}}
                    </a>
                </div>
            </div>
            @empty
            <table class="table table-striped">
                <thead>
                <tr class="table-head">
                    <th></th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Published Date')}}</th>
                    <th>{{__('Download')}}</th>
                </tr>
                @foreach($category->mainDocuments->take(3) as $document)
                    <tr>
                        <td><img src="{{asset('images/image.png')}}"
                                 width="30" alt=""></td>
                        <td>{{$document -> title}}</td>
                        <td>{{$document -> published_date}}</td>
                        <td>
                            <a href="{{route('documentDetail',[$document->slug,'language'=>$language])}}">
                                <i class="fa fa-download btn btn-primary btn-xs"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </thead>
            </table>
            <div class="text-right mb-3">
                <a class="btn btn-danger btn-sm"
                   href="{{route('documentCategory',[$category->slug,'language'=>$language])}}">
                   {{__('View More')}}
                </a>
            </div>
        @endforelse
    </div>
@endforeach
