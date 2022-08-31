<div class="modal fade" id="acceptAmount{{ $aAR->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acceptAmountLabel">Please Enter amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('paytm.payment') }}" method="post">@csrf
        <div class="modal-body">
          <span>Amount: </span>
          <input class="form-control" type="number" name="amount" id="amount">
          <input type="hidden" name="fund_id" value="{{ $aAR->id }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal({{ $aAR->id }})">Close</button>
          <button type="submit" class="btn btn-primary">Pay now</button>
        </div>
      </form>
    </div>
  </div>
</div>