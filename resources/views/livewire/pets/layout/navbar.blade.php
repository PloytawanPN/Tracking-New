<nav class="navbar-custome">
    <div class="navbar-logo">
        <img src="{{asset('assets/images/paw-solid.svg')}}"> 
        <h3>{{ env('APP_NAME') }} </h3>
    </div>
    <div class="navbar-switch">
        <label for="filter" class="switch" aria-label="Toggle Filter">
            <input type="checkbox" id="filter" wire:model.live='lang' wire:click='changelang'/>
            <span>TH</span>
            <span>EN</span>
        </label>
    </div>
</nav>
