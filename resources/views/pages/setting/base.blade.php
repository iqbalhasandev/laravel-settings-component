@extends('layouts/contentLayoutMaster')

@section('content')
<section class="input-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3">
                        Settings
                    </h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="setting_tab" class="setting_tab" value="{{ $active }}" />
                            {{-- --}}
                            <div class="panel">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach($settings as $group => $setting)
                                        <a class="nav-link @if($group==$active) active @endif "
                                            id="nav-{{ \Illuminate\Support\Str::slug($group) }}-tab" data-toggle="tab"
                                            href="#{{ \Illuminate\Support\Str::slug($group) }}" role="tab"
                                            aria-controls="nav-{{ \Illuminate\Support\Str::slug($group) }}"
                                            aria-selected="false">{{ $group }}</a>
                                        @endforeach

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @forelse($settings as $group=> $group_settings)
                                    <div class="tab-pane fade @if($group==$active) show active @endif"
                                        id="{{ \Illuminate\Support\Str::slug($group) }}" role="tabpanel"
                                        aria-labelledby="nav-{{ \Illuminate\Support\Str::slug($group) }}-tab">
                                        @forelse($group_settings as $setting)
                                        <div class="d-flex justify-content-between">
                                            <div class="panel-heading">
                                                <span class="h4">{{ $setting->display_name }}</span>
                                                <code class="badge badge-pill badge-info text-light"
                                                    style="color: #ffffff!importent; font-family: sans-serif; padding: 6px; background: #373e3d;">setting('{{ $setting->key }}')</code>
                                                <a href="javascript:void(0);" class="panel-action-btn clipboard"
                                                    data-clipboard-text="setting('{{ $setting->key }}')">
                                                    <svg width="18px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                                        xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M761.3,924.7H108v-588h653.3v196h65.3V206c0-35.7-29.6-65.3-65.3-65.3h-196C565.3,68.2,507.1,10,434.7,10C362.2,10,304,68.2,304,140.7H108c-35.7,0-65.3,29.6-65.3,65.3v718.7c0,35.7,29.6,65.3,65.3,65.3h653.3c35.7,0,65.3-29.6,65.3-65.3V794h-65.3V924.7z M238.7,206c29.6,0,29.6,0,65.3,0s65.3-29.6,65.3-65.3c0-35.7,29.6-65.3,65.3-65.3c35.7,0,65.3,29.6,65.3,65.3c0,35.7,32.7,65.3,65.3,65.3c32.7,0,33.7,0,65.3,0s65.3,29.6,65.3,65.3H173.3C173.3,231.5,201.9,206,238.7,206z M173.3,728.7H304v-65.3H173.3V728.7z M630.7,598V467.3l-261.3,196l261.3,196V728.7h326.7V598H630.7z M173.3,859.3h196V794h-196V859.3z M500,402H173.3v65.3H500V402z M304,532.7H173.3V598H304V532.7z" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="panel-actions">
                                                <a href="{{ route('admin.settings.moveUp',$setting->id) }}"
                                                    class="panel-action-btn">
                                                    <svg width="20px" enable-background="new 0 0 32 32" id="Слой_1"
                                                        version="1.1" viewBox="0 0 32 32" xml:space="preserve"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path clip-rule="evenodd"
                                                            d="M26.711,20.273l-9.999-9.977  c-0.395-0.394-1.034-0.394-1.429,0v0h0l-9.991,9.97c-0.66,0.634-0.162,1.748,0.734,1.723h19.943  C26.862,22.012,27.346,20.906,26.711,20.273z M15.998,12.433l7.566,7.55H8.432L15.998,12.433z"
                                                            fill-rule="evenodd" id="Arrow_Drop_Up" />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.settings.moveDown',$setting->id) }}"
                                                    class="panel-action-btn">
                                                    <svg width="20px" enable-background="new 0 0 32 32" id="Слой_1"
                                                        version="1.1" viewBox="0 0 32 32" xml:space="preserve"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path clip-rule="evenodd"
                                                            d="M27,11.106c0-0.564-0.489-1.01-1.044-0.995  H6.013c-0.887-0.024-1.38,1.07-0.742,1.702l9.999,9.9c0.394,0.39,1.031,0.376,1.429,0l9.991-9.892C26.879,11.64,27,11.388,27,11.106  z M15.984,19.591L8.418,12.1H23.55L15.984,19.591z"
                                                            fill-rule="evenodd" id="Arrow_Drop_Down" />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                        <g />
                                                    </svg>
                                                </a>
                                                <a href="javascript: void(0);"
                                                    onclick="delete_action('{{ route('admin.settings.delete',$setting->id) }}')"
                                                    class="panel-action-btn">
                                                    <svg width="18px" xmlns="http://www.w3.org/2000/svg"
                                                        enable-background="new 0 0 32 32" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-body mt-1 mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    @switch($setting->type)
                                                    @case('text')
                                                    <input id="{{ $setting->key }}" class="form-control" type="text"
                                                        placeholder="Setting {{ $setting->display_name }}"
                                                        name="data[{{ $setting->id }}]" id="data[{{ $setting->id }}]"
                                                        value="{{ $setting->value }}" />
                                                    @break
                                                    @case('text_area')
                                                    <textarea class="form-control" name="data[{{ $setting->id }}]"
                                                        id="data[{{ $setting->id }}]"
                                                        placeholder="Setting {{ $setting->display_name }}">{{$setting->value}}</textarea>
                                                    @break
                                                    {{-- rich_text_box --}}
                                                    @case('rich_text_box')
                                                    <textarea class='tinymce' name="data[{{ $setting->id }}]"
                                                        id="data[{{ $setting->id }}]"
                                                        placeholder="Setting {{ $setting->display_name }}">{!! $setting->value!!}</textarea>
                                                    @break
                                                    {{-- code_editor --}}
                                                    @case('code_editor')
                                                    <?php $options = json_decode($setting->details); ?>
                                                    <!-- prettier-ignore-start -->
                                                    <div id="{{ $setting->key }}" data-theme="{{ @$options->theme }}"
                                                        data-language="{{ @$options->language }}"
                                                        class="ace_editor min_height_400"
                                                        name="data[{{ $setting->id }}]">{{
                                                        $setting->value ?? '' }}</div>
                                                    <!-- prettier-ignore-end -->
                                                    <textarea name="data[{{ $setting->id }}]"
                                                        id="{{ $setting->key }}_textarea"
                                                        class="hidden">{{ $setting->value ?? '' }}</textarea>
                                                    @break
                                                    {{-- checkbox --}}
                                                    @case('checkbox')
                                                    @foreach (json_decode($setting->details) as $displayData=>$key)

                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="data[{{ $setting->id }}]" value="{{ $key }}"
                                                            @if($key==$setting->value) checked @endif
                                                        id="check{{ $key }}">
                                                        <label class="form-check-label" for="check{{ $key }}">
                                                            {{ $displayData }}
                                                        </label>
                                                    </div>
                                                    @endforeach

                                                    @break
                                                    {{-- radio_btn --}}
                                                    @case('radio_btn')
                                                    @foreach (json_decode($setting->details) as $displayData=>$key)
                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="radio"
                                                            name="data[{{ $setting->id }}]" id="check{{ $key }}"
                                                            value="{{ $key }}" @if($key==$setting->value) checked
                                                        @endif>
                                                        <label class="form-check-label" for="check{{ $key }}">
                                                            {{ $displayData }}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    @break
                                                    {{-- select_dropdown --}}
                                                    @case('select_dropdown')
                                                    <select class="select2 form-control" name="data[{{ $setting->id }}]"
                                                        id="data[{{ $setting->id }}]">
                                                        @if ($setting->value==null || $setting->value=='')
                                                        <option disabled selected>Please Select one</option>
                                                        @endif

                                                        @foreach (json_decode($setting->details) as
                                                        $displayData=>$key)
                                                        <option value="{{ $key }}" @if ($key==$setting->value)
                                                            selected
                                                            @endif>
                                                            {{ $displayData }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                    {{-- file --}}
                                                    @case('file')

                                                    <input id="{{ $setting->key }}" class="form-control" type="file"
                                                        placeholder="{{ $setting->display_name }}"
                                                        name="data[{{ $setting->id }}]" />
                                                    @isset($setting->value)
                                                    <div class="mt-1 mb-2">
                                                        <a href="{{ asset('storage/'.$setting->value) }}"
                                                            target="_blank">
                                                            <svg width="32px" height="32px" viewBox="0 0 32 32"
                                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                <!-- Generator: Sketch 3.0.3 (7891) - http://www.bohemiancoding.com/sketch -->
                                                                <defs></defs>
                                                                <g id="Page-1" stroke="none" stroke-width="1"
                                                                    fill="none" fill-rule="evenodd"
                                                                    sketch:type="MSPage">
                                                                    <g id="icon-55-document-text"
                                                                        sketch:type="MSArtboardGroup" fill="#000000">
                                                                        <path
                                                                            d="M19.5,3 L9.00276013,3 C7.89666625,3 7,3.89833832 7,5.00732994 L7,27.9926701 C7,29.1012878 7.89092539,30 8.99742191,30 L24.0025781,30 C25.1057238,30 26,29.1017876 26,28.0092049 L26,10.5 L26,10 L20,3 L19.5,3 L19.5,3 L19.5,3 Z M19,4 L8.9955775,4 C8.44573523,4 8,4.45526288 8,4.99545703 L8,28.004543 C8,28.5543187 8.45470893,29 8.9999602,29 L24.0000398,29 C24.5523026,29 25,28.5550537 25,28.0066023 L25,11 L20.9979131,11 C19.8944962,11 19,10.1134452 19,8.99408095 L19,4 L19,4 Z M20,4.5 L20,8.99121523 C20,9.54835167 20.4506511,10 20.9967388,10 L24.6999512,10 L20,4.5 L20,4.5 Z M10,10 L10,11 L17,11 L17,10 L10,10 L10,10 Z M10,7 L10,8 L17,8 L17,7 L10,7 L10,7 Z M10,13 L10,14 L23,14 L23,13 L10,13 L10,13 Z M10,16 L10,17 L23,17 L23,16 L10,16 L10,16 Z M10,19 L10,20 L23,20 L23,19 L10,19 L10,19 Z M10,22 L10,23 L23,23 L23,22 L10,22 L10,22 Z M10,25 L10,26 L23,26 L23,25 L10,25 L10,25 Z"
                                                                            id="document-text"
                                                                            sketch:type="MSShapeGroup">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('admin.settings.unsetValue',$setting->id) }}">
                                                            <svg width="16px" enable-background="new 0 0 32 32"
                                                                id="Слой_1" version="1.1" viewBox="0 0 32 32"
                                                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <g id="Cancel">
                                                                    <path clip-rule="evenodd"
                                                                        d="M16,0C7.163,0,0,7.163,0,16c0,8.836,7.163,16,16,16   c8.836,0,16-7.163,16-16C32,7.163,24.836,0,16,0z M16,30C8.268,30,2,23.732,2,16C2,8.268,8.268,2,16,2s14,6.268,14,14   C30,23.732,23.732,30,16,30z"
                                                                        fill="#121313" fill-rule="evenodd" />
                                                                    <path clip-rule="evenodd"
                                                                        d="M22.729,21.271l-5.268-5.269l5.238-5.195   c0.395-0.391,0.395-1.024,0-1.414c-0.394-0.39-1.034-0.39-1.428,0l-5.231,5.188l-5.309-5.31c-0.394-0.396-1.034-0.396-1.428,0   c-0.394,0.395-0.394,1.037,0,1.432l5.301,5.302l-5.331,5.287c-0.394,0.391-0.394,1.024,0,1.414c0.394,0.391,1.034,0.391,1.429,0   l5.324-5.28l5.276,5.276c0.394,0.396,1.034,0.396,1.428,0C23.123,22.308,23.123,21.667,22.729,21.271z"
                                                                        fill="#121313" fill-rule="evenodd" />
                                                                </g>
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    @endisset
                                                    @break
                                                    {{-- image --}}
                                                    @case('image')

                                                    <input id="{{ $setting->key }}" class="form-control" type="file"
                                                        placeholder="{{ $setting->display_name }}"
                                                        name="data[{{ $setting->id }}]" />
                                                    @isset($setting->value)
                                                    <div class="mt-1 mb-2">
                                                        <a href="{{ asset('storage/'.$setting->value) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('storage/'.$setting->value) }}"
                                                                width="128px">
                                                        </a>
                                                        <a href="{{ route('admin.settings.unsetValue',$setting->id) }}">
                                                            <svg width="16px" enable-background="new 0 0 32 32"
                                                                id="Слой_1" version="1.1" viewBox="0 0 32 32"
                                                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <g id="Cancel">
                                                                    <path clip-rule="evenodd"
                                                                        d="M16,0C7.163,0,0,7.163,0,16c0,8.836,7.163,16,16,16   c8.836,0,16-7.163,16-16C32,7.163,24.836,0,16,0z M16,30C8.268,30,2,23.732,2,16C2,8.268,8.268,2,16,2s14,6.268,14,14   C30,23.732,23.732,30,16,30z"
                                                                        fill="#121313" fill-rule="evenodd" />
                                                                    <path clip-rule="evenodd"
                                                                        d="M22.729,21.271l-5.268-5.269l5.238-5.195   c0.395-0.391,0.395-1.024,0-1.414c-0.394-0.39-1.034-0.39-1.428,0l-5.231,5.188l-5.309-5.31c-0.394-0.396-1.034-0.396-1.428,0   c-0.394,0.395-0.394,1.037,0,1.432l5.301,5.302l-5.331,5.287c-0.394,0.391-0.394,1.024,0,1.414c0.394,0.391,1.034,0.391,1.429,0   l5.324-5.28l5.276,5.276c0.394,0.396,1.034,0.396,1.428,0C23.123,22.308,23.123,21.667,22.729,21.271z"
                                                                        fill="#121313" fill-rule="evenodd" />
                                                                </g>
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                                <g />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    @endisset
                                                    @break
                                                    @default
                                                    <input id="data[{{ $setting->id }}]" class="form-control"
                                                        type="{{$setting->type}}" value="{{$setting->value}}"
                                                        placeholder="{{$setting->display_name}}"
                                                        name="data[{{ $setting->id }}]" />
                                                    @endswitch


                                                    <div class="my-1">
                                                        {!! $setting->note !!}
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <select class="select2Tag form-control"
                                                            name="group[{{ $setting->id }}]"
                                                            id="group[{{ $setting->id }}]">
                                                            @foreach ($groups as $group)
                                                            <option value="{{ $group }}" {{ selected($group,$setting->
                                                                group) }}>
                                                                {{ $group }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <p class="text-muted text-center">No Setting Found...</p>
                                        @endforelse
                                    </div>
                                    @empty
                                    <p class="text-muted text-center">No Setting Found...</p>
                                    @endforelse
                                </div>
                            </div>
                            @if (count($settings)>0)
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary">Save Settings</button>
                            </div>
                            @endif
                            {{-- --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- create new Settings --}}
        <div class=" col-md-12">
            <div class="card">
                <form action="{{ route('admin.settings.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-header">
                        <h3 class="h3">
                            Create Setting New
                        </h3>
                    </div>
                    <hr>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-3 form-group ">
                                    <label class="" for="display_name">Name</label>
                                    <input id="display_name" class="form-control" type="text" name="display_name"
                                        placeholder="Setting name ex: Admin Title" required focus />
                                    @error('display_name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="" for="key">Key</label>
                                    <input id="key" class="form-control" type="text" name="key"
                                        placeholder="Setting key ex: admin_title" required />
                                    @error('key')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="" for="type">Type</label>
                                    <select class="select2 form-control" name="type" id="type" required>
                                        <option disabled selected>Choose Type</option>
                                        @foreach ($S_TYPES as $key=>$item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="" for="group">Group</label>
                                    <select class="select2Tag form-control" name="group" id="group" required>
                                        <option selected disabled>Select Existing Group or Add
                                            New</option>
                                        @foreach ($groups as $group)
                                        <option value="{{ $group }}">{{ $group }}</option>
                                        @endforeach
                                    </select>
                                    @error('group')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <a href="javaScript:void(0);" class="setting-extra-btn" id="extraOptionOpen">
                                        Add Extra Option
                                    </a>
                                    <a href="javaScript:void(0);" class="setting-extra-btn" id="extraOptionClose"
                                        style="display: none">
                                        Close Extra Option
                                    </a>
                                    <a href="javaScript:void(0);" class="setting-extra-btn" id="addNoteOpen">
                                        Add Note
                                    </a>
                                    <a href="javaScript:void(0);" class="setting-extra-btn" id="addNoteClose"
                                        style="display: none">
                                        Close Note
                                    </a>
                                </div>
                                <div class="col-md-12 form-group" id="extraOption" style="display: none">
                                    <label class="" for="setting_details">Extra option ( JSON DATA )</label>
                                    <div id="setting_details" data-theme="clouds" data-language="json"
                                        class="ace_editor min_height_400" name="details">{{ $details ?? '' }}</div>
                                    <textarea name="details" id="setting_details_textarea"
                                        style="display: none">{{ $details ?? '' }}</textarea>
                                </div>
                                <div class="col-md-12 form-group" id="addNote" style="display: none">
                                    <label class="" for="setting_note">Add Note</label>
                                    <div id="setting_note" data-theme="clouds" data-language="html"
                                        class="ace_editor min_height_400" name="details">{{ $note ?? '' }}</div>
                                    <textarea name="note" id="setting_note_textarea"
                                        style="display: none">{{ $note ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="d-flex m-1 justify-content-end">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<form action="" method="POST" id="delete-form" style="display: none">
    @csrf
    @method('Delete')
</form>

@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{ asset('admin-assets/libs/select2/select2.min.css') }}">
<style>
    .hidden {
        display: none;
    }

    .ace_editor {
        position: relative;
        min-height: 100px;
    }

    .setting-extra-btn {
        text-decoration: underline;
        padding: 5px;
        font-size: 15px;
    }

    .setting-extra-btn:hover {
        color: #4b4848
    }

    .select2,
    .select2.select2-container.select2-container--default,
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        display: block;
        width: 100% !important;
        height: calc(1.5em + .9rem + 2px);
        font-size: .8125rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6c757d;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .2rem;
        -webkit-transition: bor;
    }

    .panel-action-btn {
        color: #121313;
    }

    .panel-action-btn:hover {
        color: #0c0c0c
    }
</style>
@endsection
@section('vendor-script')

@endsection
@section('page-script')
@include('panels.delete');
<script src="{{ admin_asset('libs/select2/select2.min.js') }}"></script>
<script src="{{ admin_asset('libs/clipboard/clipboard.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/theme-clouds.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.1/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ admin_asset('js/settings.js') }}"></script>
@endsection