<div class="card mb-2 tetel-card">
    <form method="POST" action="{{ $update }}">
        @csrf
        @method('PUT')
        <div class="d-flex align-items-center card-body">
            <div class="col-7 px-0">
                <input type="text" name="time" class="input-hide name" value="{{ $tetel->time  }}">
            </div>
            <div class="col-5">
                <button class="btn btn-success btn-block mx-3" type="submit">Mentés</button>
            </div>
        </div>
    </form>
</div>
