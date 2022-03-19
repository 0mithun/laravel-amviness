<aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4"
    style="background-color: {{ $setting->dark_mode ? '' : $setting->sidebar_color }}">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ $setting->logo_image_url }}" alt="Logo" class="img-circle elevation-3"
                style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $setting->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatar">
                    <img src="{{$user->image_url }}" class="elevation-2" alt="User Image">
                </div>
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ $user->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-flat"
                data-widget="treeview" role="menu" data-accordion="false">
                @if ($user->can('dashboard.view'))
                    <x-admin.sidebar-list :linkActive="Route::is('admin.dashboard') ? true : false" route="admin.dashboard"
                        icon="fas fa-tachometer-alt">
                        {{ __('dashboard') }}
                    </x-admin.sidebar-list>
                @endif
                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

                    <x-admin.sidebar-dropdown
                        :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                        :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                        icon="fas fa-lock">
                        @slot('title')
                            {{ __('user_role_manage') }}
                        @endslot

                        @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                            <ul class="nav nav-treeview">
                                <x-admin.sidebar-list
                                    :linkActive="Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                    route="user.index" icon="fas fa-users">
                                    {{ __('all_users') }}
                                </x-admin.sidebar-list>
                            </ul>
                        @endif
                        @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                            <ul class="nav nav-treeview">
                                <x-admin.sidebar-list
                                    :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? true : false"
                                    route="role.index" icon="fas fa-lock">
                                    {{ __('all_roles') }}
                                </x-admin.sidebar-list>
                            </ul>
                        @endif
                    </x-admin.sidebar-dropdown>
                @endif
                @if ($user->can('setting.view') || $user->can('setting.update'))
                    <x-admin.sidebar-list :linkActive="Request::is('settings/*')  ? true : false" route="settings.website" icon="fas fa-cog">
                        {{ __('settings') }}
                    </x-admin.sidebar-list>
                @endif

                @if ($user->can('setting.view') || $user->can('setting.update'))
                    <x-admin.sidebar-list :linkActive="Request::is('languages/*')  ? true : false" route="language.index" icon="fas fa-language">
                        {{ __('language') }}
                    </x-admin.sidebar-list>
                @endif

            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-flat"
            data-widget="treeview" role="menu" data-accordion="false">
            {{-- @if ($user->can('dashboard.view'))
                <x-admin.sidebar-list :linkActive="Route::is('home') ? true : false" route="home"
                    icon="fas fa-tachometer-alt">
                    Dashboard
                </x-admin.sidebar-list>
            @endif --}}

        <!-- Company Module -->
        {{-- @if (Module::collections()->has('Company'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.product.company.index') || Route::is('module.company.index') || Route::is('module.company.create') || Route::is('module.company.edit') ? true : false"
                route="module.company.index" icon="fas fa-store">
                Company
            </x-admin.sidebar-list>
        @endif --}}
        <!-- Candidate -->
        {{-- @if (Module::collections()->has('Candidate'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.product.candidate.index') || Route::is('module.candidate.index') || Route::is('module.candidate.create') || Route::is('module.candidate.edit') ? true : false"
                route="module.candidate.index" icon="fas fa-store">
                Candidate
            </x-admin.sidebar-list>
        @endif --}}

        @if (Module::collections()->has('Product'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.product.gallery.index') || Route::is('module.product.index') || Route::is('module.product.create') || Route::is('module.product.edit') ? true : false"
                route="module.product.index" icon="fas fa-box">
                Product
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Attribute'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.attributes.index') || Route::is('module.attributes.create') || Route::is('module.attributes.edit') || Route::is('module.attribute.value.index') || Route::is('module.attribute.value.edit') ? true : false"
                route="module.attributes.index" icon="fas fa-plus">
                Attributes
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Category') || Module::collections()->has('Brand'))
            <x-admin.sidebar-dropdown
                :linkActive="Route::is('module.product.edit') || Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') || Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                :subLinkActive="Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') || Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                icon="fas fa-tags">
                @slot('title')
                    Categories
                @endslot

                <ul class="nav nav-treeview">
                    <x-admin.sidebar-list
                        :linkActive="Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') ? true : false"
                        route="module.category.index" icon="fas fa-circle">
                        Category
                    </x-admin.sidebar-list>
                </ul>
                <ul class="nav nav-treeview">
                    <x-admin.sidebar-list
                        :linkActive="Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                        route="module.subcategory.index" icon="fas fa-circle">
                        Subcategory
                    </x-admin.sidebar-list>
                </ul>
            </x-admin.sidebar-dropdown>
        @endif
        @if (Module::collections()->has('Brand'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.brand.index') || Route::is('module.brand.create') || Route::is('module.brand.edit') ? true : false"
                route="module.brand.index" icon="fas fa-tags">
                Brand
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Blog'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.post.index') || Route::is('module.post.create') || Route::is('module.post.edit') ? true : false"
                route="module.post.index" icon="fas fa-blog">
                Blog
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Faq'))
            <li class="nav-item">
                <a href="{{ route('module.faq.index') }}"
                    class="nav-link {{ Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>Faq</p>
                </a>
            </li>
        @endif
        {{-- @if (Module::collections()->has('Comment'))
            <li class="nav-item">
                <a href="{{ route('comment.index') }}"
                    class="nav-link {{ Route::is('comment.index') || Route::is('comment.create') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>Comment</p>
                </a>
            </li>
        @endif --}}
        @if (Module::collections()->has('Tag'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.tag.index') || Route::is('module.tag.create') || Route::is('module.tag.edit') ? true : false"
                route="module.tag.index" icon="fas fa-tag">
                Tag
            </x-admin.sidebar-list>
        @endif
        {{-- @if (Module::collections()->has('Team'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.team.index') || Route::is('module.team.create') || Route::is('module.team.edit') ? true : false"
                route="module.team.index" icon="fas fa-users">
                Team
            </x-admin.sidebar-list>
        @endif --}}
        {{-- @if (Module::collections()->has('Priceplan'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.priceplan.index') || Route::is('module.priceplan.create') || Route::is('module.priceplan.edit') ? true : false"
                route="module.priceplan.index" icon="fas fa-money-check">
                Priceplan
            </x-admin.sidebar-list>
        @endif --}}
        @if (Module::collections()->has('Newsletter'))
            <x-admin.sidebar-list
                :linkActive="Route::is('review.index') || Route::is('review.create') || Route::is('review.edit') ? true : false"
                route="review.index" icon="fas fa-star">
                Review
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Newsletter'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.newsletter.index') || Route::is('module.newsletter.create') || Route::is('module.newsletter.edit') ? true : false"
                route="module.newsletter.index" icon="fas fa-newspaper">
                Newsletter
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Portfolio'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.portfolio.index') || Route::is('module.portfolio.create') || Route::is('module.portfolio.edit') ? true : false"
                route="module.portfolio.index" icon="fas fa-user">
                Portfolio
            </x-admin.sidebar-list>
        @endif
        {{-- @if (Module::collections()->has('Job'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.job.index') || Route::is('module.job.create') || Route::is('module.job.edit') ? true : false"
                route="module.job.index" icon="fas fa-briefcase">
                Jobs
            </x-admin.sidebar-list>
        @endif --}}
        @if (Module::collections()->has('Testimonial'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.testimonial.index') || Route::is('module.testimonial.create') || Route::is('module.testimonial.edit') ? true : false"
                route="module.testimonial.index" icon="fas fa-briefcase">
                Testimonial
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Coupon'))
            <x-admin.sidebar-list
                :linkActive="Route::is('coupon.index') || Route::is('coupon.create') || Route::is('coupon.edit') ? true : false"
                route="coupon.index" icon="fas fa-percentage">
                Coupon
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Wishlist'))
            <x-admin.sidebar-list :linkActive="Route::is('module.wishlist.index') ? true : false"
                route="module.wishlist.index" icon="fas fa-heart">
                Wishlist
            </x-admin.sidebar-list>
        @endif
        @if (Module::collections()->has('Job'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.contact.index') || Route::is('module.contact.create') || Route::is('module.contact.edit') ? true : false"
                route="module.contact.index" icon="fas fa-address-book">
                Contact
            </x-admin.sidebar-list>
        @endif

        {{-- @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

            <x-admin.sidebar-dropdown
                :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') || Route::is('x-admin.sidebar-dropdown') || Route::is('website.setting.create') || Route::is('website.setting.edit') ? true : false"
                :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') || Route::is('x-admin.sidebar-dropdown') || Route::is('website.setting.create') || Route::is('website.setting.edit') ? true : false"
                icon="fas fa-lock">
                @slot('title')
                    Others
                @endslot

                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                    <ul class="nav nav-treeview">
                        <x-admin.sidebar-list
                            :linkActive="Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                            route="user.index" icon="fas fa-users">
                            All Users
                        </x-admin.sidebar-list>
                    </ul>
                @endif
                @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                    <ul class="nav nav-treeview">
                        <x-admin.sidebar-list
                            :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? true : false"
                            route="role.index" icon="fas fa-lock">
                            All Roles
                        </x-admin.sidebar-list>
                    </ul>
                @endif
                @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                    <ul class="nav nav-treeview">
                        <x-admin.sidebar-list
                            :linkActive="Route::is('x-admin.sidebar-dropdown') || Route::is('website.setting.create') || Route::is('website.setting.edit') ? true : false"
                            route="x-admin.sidebar-dropdown" icon="fas fa-users-cog">
                            User Settings
                        </x-admin.sidebar-list>
                    </ul>
                @endif
            </x-admin.sidebar-dropdown>
        @endif --}}

        {{-- @if (Module::collections()->has('Language'))
            <x-admin.sidebar-dropdown
                :linkActive="Route::is('language.index') || Route::is('language.create') || Route::is('language.edit') || Route::is('language.view') ? true : false"
                :subLinkActive="Route::is('language.index') || Route::is('language.create') || Route::is('language.edit') || Route::is('language.view') ? true : false"
                icon="fas fa-tags">
                @slot('title')
                Language
                @endslot

                <ul class="nav nav-treeview">
                    <x-admin.sidebar-list
                        :linkActive="Route::is('language.index') ? true : false"
                        route="language.index" icon="fas fa-circle">
                        Language List
                    </x-admin.sidebar-list>
                </ul>
                <ul class="nav nav-treeview">
                    <x-admin.sidebar-list
                        :linkActive="Route::is('language.create') ? true : false"
                        route="language.create" icon="fas fa-circle">
                        Add Language
                    </x-admin.sidebar-list>
                </ul>
            </x-admin.sidebar-dropdown>
        @endif --}}
        @if (Module::collections()->has('Setting'))
        <x-admin.sidebar-list
            :linkActive="Route::is('module.banner.index') || Route::is('module.banner.create') || Route::is('module.banner.edit') ? true : false"
            route="module.banner.index" icon="fas fa-briefcase">
            Banner
        </x-admin.sidebar-list>
         @endif
        @if (Module::collections()->has('Setting'))
            <x-admin.sidebar-list
                :linkActive="Route::is('module.setting.index') || Route::is('module.setting.create') || Route::is('module.setting.edit') ? true : false"
                route="module.setting.index" icon="fas fa-cogs">
                Setting
            </x-admin.sidebar-list>
        @endif

        <li class="nav-item">
            <a target="_blank" href="{{ route('home') }}" class="nav-link btn bg-primary  text-light">
                <i class="nav-icon fas fa-link"></i>
                <p>Visit Website</p>
            </a>
        </li>


    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
