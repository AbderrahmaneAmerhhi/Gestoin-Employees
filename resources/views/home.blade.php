@extends('layouts.app')
@section('title')
Home
@endsection

@section('content')
<div class="container mx-auto space-y-4 p-4 sm:p-0">

    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: auto;">
            {!! $chart1->renderHtml() !!}
        </div>
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: auto;">
            <h2> Employes By Depts</h2>
            {!! $chart2->renderHtml() !!}
        </div>


    </div>
</div>

@endsection


@section('script')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart2->renderChartJsLibrary() !!}
{!! $chart2->renderJs() !!}
@endsection


