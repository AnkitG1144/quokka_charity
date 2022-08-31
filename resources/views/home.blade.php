@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @elseif(session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            {{ session()->get('warning') }}
        </div>
    @endif
    
    <section >
        <div class="container py-5">
            <div class="row">
                @foreach($allActiveRequest as $key => $aAR)
                <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 rounded-2">
                    <div class="card">
                        <div class="d-flex justify-content-between p-3 mb-0">
                            <p class="lead mb-0">{{ $aAR->name }}</p>
                            @switch($aAR->priority)
                                @case(0)
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center shadow-1-strong p-2" style="width: auto; height: 35px;">
                                        <p class="text-white mb-0 small"><i class="fa-solid fa-angles-down"></i> Lowest</p>
                                    </div>
                                    @break
                                    
                                @case(1)
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center shadow-1-strong p-2" style="width: auto; height: 35px;">
                                        <p class="text-white mb-0 small"><i class="fa-solid fa-angle-down"></i> Low</p>
                                    </div>
                                    @break
                                    
                                @case(2)
                                    <div class="bg-success rounded d-flex align-items-center justify-content-center shadow-1-strong p-2" style="width: auto; height: 35px;">
                                        <p class="text-white mb-0 small">- Medium</p>
                                    </div>
                                    @break
                                    
                                @case(3)
                                    <div class="bg-warning rounded d-flex align-items-center justify-content-center shadow-1-strong p-2" style="width: auto; height: 35px;">
                                        <p class="text-white mb-0 small"><i class="fa-solid fa-angle-up"></i> High</p>
                                    </div>
                                    @break

                                @case(4)
                                    <div class="bg-danger rounded d-flex align-items-center justify-content-center shadow-1-strong p-2" style="width: auto; height: 35px;">
                                        <p class="text-white mb-0 small"><i class="fa-solid fa-angles-up"></i> Highest</p>
                                    </div>
                                    @break
                            @endswitch
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <p class="text-muted mb-0">By: {{ $aAR->manager}}</p>
                            </div>
                            <div class=" mb-2">
                                <p class="requestDesc">{{ $aAR->desc }}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">To Be Raised: <span class="fw-bold">{{ $aAR->amount}}</span></p>
                                <p class="text-muted mb-0">Supporters: <span class="fw-bold">{{ $aAR->total }}</span></p>
                            </div>
                            @if(!Auth::check())
                            <div>
                                <button type="button" class="btn btn-success" style="width: 100%" onclick="showModal({{ $aAR->id }})">Support by Paytm</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @include('modals.acceptAmount')
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('styles')
<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
    function showModal(id){
        $("#acceptAmount"+id).modal('show')
    }

    const closeModal = (id) =>{
        $("#acceptAmount"+id).modal('hide')
    }
</script>
@endsection