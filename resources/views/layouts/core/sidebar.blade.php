<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
                <!--begin::Sidebar Brand-->
                <div class="sidebar-brand">
                    <!--begin::Brand Link-->
                    <a href="./index.html" class="brand-link">
                        <!--begin::Brand Image-->
                        <img src="{{ url('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
                        <!--end::Brand Image-->
                        <!--begin::Brand Text-->
                        <span class="brand-text fw-light">IRIS</span>
                        <!--end::Brand Text-->
                    </a>
                    <!--end::Brand Link-->
                </div>
                <!--end::Sidebar Brand-->
                <!--begin::Sidebar Wrapper-->
                <div class="sidebar-wrapper">
                    <nav class="mt-2">
                        <!--begin::Sidebar Menu-->
                        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false"> 
                             <li class="nav-item">
                                <a href="{{ url('home') }}" class="nav-link">
                                    <i class="bi bi-house-fill"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('client.applicants.index') }}" class="nav-link">
                                    <i class="bi bi-people-fill"></i>
                                    <p>Applicants</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>
                                        Manage Applicants
                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                    </p>
                                </a>
                                 <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('client.work_experiences.index') }}" class="nav-link">
                                            <i class="bi bi-briefcase-fill"></i>
                                            <p>Work Experiences</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('client.educations.index') }}" class="nav-link">
                                            <i class="bi bi-mortarboard-fill"></i>
                                            <p>Educations</p>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('client.medicals.index') }}" class="nav-link">
                                            <i class="bi bi-clipboard2-pulse-fill"></i>
                                            <p>Medical Records</p>
                                        </a>
                                    </li>
                                </ul>
                                <li class="nav-item">
                                    <a href="{{ route('client.jobs.index') }}" class="nav-link">
                                        <i class="bi bi-buildings-fill"></i>
                                        <p>Job Openings</p>
                                    </a>
                               </li>
                               <li class="nav-item">
                                    <a href="{{ route('client.job_applications.index') }}" class="nav-link">
                                        <i class="bi bi-file-earmark-person-fill"></i>
                                        <p>Job Applications</p>
                                    </a>
                               </li>
                                <li class="nav-item">
                                    <a href="{{ route('client.finances.index') }}" class="nav-link">
                                        <i class="bi bi-cash-stack"></i>
                                        <p>Finances</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('client/users') }}" class="nav-link">
                                        <i class="bi bi-person-circle"></i>
                                        <p>Manage User</p>
                                    </a>
                               </li>
                               <li class="nav-item">
                                    <a href="{{ route('client.audit_logs.index') }}" class="nav-link">
                                        <i class="bi bi-flag-fill"></i>
                                        <p>Logs</p>
                                    </a>
                               </li>
                            </li>
                        </ul>
                        <!--end::Sidebar Menu-->
                    </nav>
                </div>
                <!--end::Sidebar Wrapper-->
            </aside>