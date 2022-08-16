<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        {!! Menu::render('sidebar') !!}

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-globe"></i> @lang('Visit Website')
            </a>
        </div>
    </aside>
</div>
