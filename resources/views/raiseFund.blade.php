@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Raise Fund') }}</div>

                <div class="card-body">

                    <form action="{{ url('/raise-fund') }}" method="post">@csrf
                        <div class="mb-3">
                            <label for="fundRaisingFor" class="form-label">Fund Raising For</label>
                            <input type="text" class="form-control" id="fundRaisingFor" placeholder="Fund Raising for" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Give some more light</label>
                            <textarea class="form-control" id="desc" placeholder="Details about fund Raising" name="desc" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority </label>
                            <select  class="form-control" name="priority" id="priority" aria-label="Default select">
                                <option value="" selected disabled>Please choose priority</option>
                                <option value="0">Lowest</option>
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>
                                <option value="4">Highest</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Total Amout in Rs. </label>
                            <input type="number" class="form-control" id="amount" placeholder="Total Amount to be raised" name="amount">
                        </div>
                        <div class="mb-3">
                            <label for="nameFundManager" class="form-label">Fund Manager Name</label>
                            <input type="text" class="form-control" id="nameFundManager" placeholder="Name of Fund manager" name="name_fund_manager">
                        </div>
                        <div class="mb-3">
                            <label for="emailFundManager" class="form-label">Fund Manager email</label>
                            <input type="text" class="form-control" id="emailFundManager" placeholder="Email of Fund manager" name="email_fund_manager">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Detail</label>
                            <input type="number" class="form-control" id="contact" placeholder="Contact Number" name="contactDetails">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success float-end m-2">Raise Request</button>
                            <button type="reset" class="btn btn-danger float-end m-2">Reset and Request new</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection