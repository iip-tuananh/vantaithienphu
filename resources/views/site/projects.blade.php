@extends('site.layouts.master')

@section('title')
    {{ $categoryProject->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$categoryProject->image ? $categoryProject->image->path : $config->image->path }}
@endsection

@section('css')
    <style>
        .box-hover:hover .imgzomo img {
            transform: scale(1.1);
        }

        .effect-tilt .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .effect-tilt .grid .grid-item {
            width: 100%;
        }

        .pt-100 {
            padding-top: 100px;
        }
    </style>
@endsection

@section('content')
    <!-- Main Wrapper-->
    <main class="wrapper">
        <section class="pt-100">
            <div class="container">
                <div class="wptb-project--inner">
                    <div class="wptb-heading">
                        <div class="wptb-item--inner text-center">
                            <h6 class="wptb-item--subtitle">Album</h6>
                            <h1 class="wptb-item--title" style="font-size: 35px; margin-top: 0px;"> <span>{{ $categoryProject->name }}</span>
                            </h1>
                        </div>
                    </div>
                    <div class="has-radius effect-tilt">
                        <div class="grid clearfix">
                            @foreach ($projects as $project)
                                <div class="grid-item box-hover">
                                    <div class="wptb-item--inner">
                                        <div class="wptb-item--image">
                                            <a class="w-100 imgzomo" style="height: 100%;"
                                                href="{{ route('front.getProjectDetail', $project->slug) }}">
                                                <img src="{{ $project->image ? $project->image->path : 'https://placehold.co/600x400' }}"
                                                    alt="img" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="wptb-item--holder">
                                            <div class="wptb-item--meta">
                                                <h4><a href="{{ route('front.getProjectDetail', $project->slug) }}"><span
                                                            style="font-size: 20px; font-family: var(--font-family-two); font-style: italic; font-weight: var(--fw-light); transition: var(--transition-base);">{{ $project->name }}</span></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="wptb-pagination-wrap text-center">
                    <nav>
                        {{ $projects->links() }}
                    </nav>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
@endpush
