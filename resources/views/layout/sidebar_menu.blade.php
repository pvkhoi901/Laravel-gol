<li class="nav-item nav-category">Main</li>
<li class="nav-item {{ active_class(['/']) }}">
    <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">Dashboard</span>
    </a>
</li>

<li class="nav-item {{ active_class(['crawl_data*' ]) }}">
    <a class="nav-link {{ active_class(['crawl_data*'], 'collapsed') }}" data-toggle="collapse" href="#crawl_data" role="button" aria-expanded="{{ active_class(['crawl_data*'], 'true') }}">
        <i class="link-icon" data-feather="inbox"></i>
        <span class="link-title">Crawl Data</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ active_class(['crawl_data/*'], 'show') }}" id="crawl_data">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="/" class="nav-link {{ active_class(['crawl_data/website_element*']) }}">
                    Element Dom(Ecomerce)
                </a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link {{ active_class(['crawl_data/influencer*']) }}">
                    Website Influencer
                </a>
            </li>
        </ul>
    </div>
</li> 

<li class="nav-item {{ active_class(['managerapi*']) }}">
    <a class="nav-link {{ active_class(['managerapi*'], 'collapsed') }}" data-toggle="collapse" href="#managerapi" role="button" aria-expanded="{{ active_class(['managerapi*'], 'true') }}">
        <i class="link-icon" data-feather="inbox"></i>
        <span class="link-title">Canvasee Api Doc</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ active_class(['managerapi*'], 'show') }}" id="managerapi">
        <ul class="nav sub-menu">


            <li class="nav-item">
                <a href="/" class="nav-link {{ active_class(['managerapi/api_description*']) }}">
                    Api Descriptions
                </a>
            </li>

        </ul>
    </div>
</li>

<li class="nav-item {{ active_class(['email*']) }}">
    <a class="nav-link {{ active_class(['email*'], 'collapsed') }}" data-toggle="collapse" href="#email" role="button" aria-expanded="{{ active_class(['email*'], 'true') }}">
        <i class="link-icon" data-feather="inbox"></i>
        <span class="link-title">Email</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ active_class(['email*'], 'show') }}" id="email">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('email.index') }}" class="nav-link {{ active_class(['email/template*']) }}">
                    Send Email Ads
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('emailMarketings.index') }}" class="nav-link {{ active_class(['email/emailMarketings*']) }}">
                    Send Email Custom Ads
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item {{ active_class(['generator_builder*']) }}">
    <a href="/generator_builder" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">CRUD</span>
    </a>
</li>

<li class="nav-item" {{ active_class(['languages*'], 'show') }} id="languages">
    <a href="{{ route('languages.index') }}" class="nav-link {{ active_class(['languages*']) }}">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">Languages</span>
    </a>
</li>




<li class="nav-item" {{ active_class(['settings*'], 'show') }} id="settings">
    <a href="{{ route('settings.index') }}" class="nav-link {{ active_class(['settings*']) }}">
        <i class="link-icon" data-feather="settings"></i>
        <span class="link-title">Setting</span>
    </a>
</li>


<li class="nav-item {{ active_class(['media_images*'], 'active') }}" {{ active_class(['media_images*'], 'show') }} id="media_images">
    <a href="{{ route('media_images.index') }}" class="nav-link {{ active_class(['media_images*']) }}">
        <i class="link-icon" data-feather="user-plus"></i>
        <span class="link-title">Media Images</span>
    </a>
</li>

<li class="nav-item" {{ active_class(['user_manager*'], 'show') }} id="user_manager">
    <a href="{{ route('user_manager.index') }}" class="nav-link {{ active_class(['user_manager*']) }}">
        <i class="link-icon" data-feather="user-plus"></i>
        <span class="link-title">User Managers</span>
    </a>
</li>

