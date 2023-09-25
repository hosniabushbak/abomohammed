<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('page_section_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/head-sections*") ? "c-show" : "" }} {{ request()->is("admin/sections*") ? "c-show" : "" }} {{ request()->is("admin/testimonials*") ? "c-show" : "" }} {{ request()->is("admin/questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-puzzle-piece c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.pageSection.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('head_section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.head-sections.index') }}" class="c-sidebar-nav-link {{ request()->is("admin/head-sections") || request()->is("admin/head-sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-heading c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.headSection.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-puzzle-piece c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.section.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('testimonial_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.testimonials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testimonial.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('clients_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clients*") ? "c-show" : "" }} {{ request()->is("admin/event-titles*") ? "c-show" : "" }} {{ request()->is("admin/client-events*") ? "c-show" : "" }} {{ request()->is("admin/answers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-lock c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientsManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('client_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.client.title') }}
                            </a>
                        </li>
                    @endcan
                        @can('Email_client_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.clients.emails") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients/emails") || request()->is("admin/clients/emails/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-at c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.client.fields.emails') }}
                                </a>
                            </li>
                        @endcan
                    @can('event_title_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-titles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-titles") || request()->is("admin/event-titles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventTitle.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-events") || request()->is("admin/client-events/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientEvent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.answer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('system_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/site-settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.system.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('site_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.site-settings.edit', 1) }}" class="c-sidebar-nav-link {{ request()->is("admin/site-settings") || request()->is("admin/site-settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.siteSetting.title') }}
                            </a>
                        </li>
                    @endcan

                        @can('service_provider_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.service-providers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-providers") || request()->is("admin/service-providers/*") ? "c-active" : "" }}">
                                    <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.serviceProvider.title') }}
                                </a>
                            </li>
                        @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_profile') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
