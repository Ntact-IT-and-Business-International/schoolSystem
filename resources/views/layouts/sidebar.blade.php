{{-- <ul class="sidenav-inner py-1">
    <li @if (\Request::route()->getName() == 'Dashboard') class="sidenav-item  open active" @else class="sidenav-item" @endif>
        <a href="/dashboard" class="sidenav-link">
            <i class="sidenav-icon feather icon-home"></i>
            <div>Dashboards</div>
        </a>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-users"></i>
            <div>Students</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Students') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/class" class="sidenav-link">
                    <div>Class</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Year') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/year" class="sidenav-link">
                    <div>Year</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Attendance') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/attendance" class="sidenav-link">
                    <div>Daily Attendence</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Permission') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/pupils-permission" class="sidenav-link">
                    <div>Pupil Permission</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-user-check"></i>
            <div>Staff</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Teaching Staff') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/teaching-staff" class="sidenav-link">
                    <div>Teaching Staff</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Non Teaching Staff') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/non-teaching-staff" class="sidenav-link">
                    <div>Non Teaching Staff</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Staff Permission Requests') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/permissions/all-staff-permission-requests" class="sidenav-link">
                    <div>Staff Permissions</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Permission Requests') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/permissions/all-students-permission-requests" class="sidenav-link">
                    <div>Students Permissions</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/staff/request-for-permission" class="sidenav-link">
                    <div>Request For Permission</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/staff/my-permission-requests" class="sidenav-link">
                    <div>My Permission Requests</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-pie-chart"></i>
            <div>Teaching</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/class/classes" class="sidenav-link">
                    <div>Classes</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/subject/subjects" class="sidenav-link">
                    <div>Subjects</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/library/library" class="sidenav-link">
                    <div>Library</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/timetable/timetable" class="sidenav-link">
                    <div>Timetable</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-briefcase"></i>
            <div>Finance</div>
        </a>
        <ul class="sidenav-menu">
        <li class="sidenav-item">
                <a href="/fees/fees-structure" class="sidenav-link">
                    <div>Fee Structure</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/fees/school-fees" class="sidenav-link">
                    <div>Fees</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-file-plus"></i>
            <div>Examinations</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/reportcard/examinations" class="sidenav-link">
                    <div>Enter Results</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/reportcard/generate-primary-report-card" class="sidenav-link">
                    <div>Primary Report Cards</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/reportcard/generate-nursery-report-card" class="sidenav-link">
                    <div>Nursery Report Crads</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/reportcard/holiday-package" class="sidenav-link">
                    <div>Holiday Package</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/reportcard/ple-results" class="sidenav-link">
                    <div>PLE Results</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-external-link"></i>
            <div>Expenditures</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/expenditure/items" class="sidenav-link">
                    <div>Items</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/expenditure/my-item-requests" class="sidenav-link">
                    <div>My Requests</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/expenditure/requested-items-in-your-office" class="sidenav-link">
                    <div>Items Requested</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/expenditure/expenditure" class="sidenav-link">
                    <div>Expenditure</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/expenditure/salaries" class="sidenav-link">
                    <div>Salaries</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-plus-circle"></i>
            <div>Nurse</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/nurse/request-for-sickbay-items" class="sidenav-link">
                    <div>Request For Items</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/nurse/records" class="sidenav-link">
                    <div>Sickbay-Records</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-shopping-cart"></i>
            <div>Carteen</div>
        </a>
        <ul class="sidenav-menu">
        <li class="sidenav-item">
                <a href="/carteen/deposit-money" class="sidenav-link">
                    <div>Deposit Students Cash</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/carteen/daily-spendings" class="sidenav-link">
                    <div>Daily-Records</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-package"></i>
            <div>Store</div>
        </a>
        <ul class="sidenav-menu">
        <li class="sidenav-item">
                <a href="/store/food" class="sidenav-link">
                    <div>Food</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/store/office-of-dos" class="sidenav-link">
                    <div>Office Of Dos</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-layers"></i>
            <div>About Us</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/about/team" class="sidenav-link">
                    <div>Team</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/about/faq" class="sidenav-link">
                    <div>FAQ</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-box"></i>
            <div>Services</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="/services/events" class="sidenav-link">
                    <div>Events</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/services/service" class="sidenav-link">
                    <div>Services</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/services/other-services" class="sidenav-link">
                    <div>Other Services</div>
                </a>
            </li>
        </ul>
    </li>
    <li  @if (\Request::route()->getName() == 'Portfolio') class="sidenav-item active" @else class="sidenav-item" @endif>
            <a href="/portfolio/blog" class="sidenav-link">
                <i class="sidenav-icon feather icon-activity"></i>
                <div>Portfolio</div>
            </a>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-mail"></i>
            <div>Messages</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Messages') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/contact/messages" class="sidenav-link">
                    <div>Messages</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/contact/parents-messages" class="sidenav-link">
                    <div>Parents Messages</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Pages -->
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-settings"></i>
            <div>Account Settings</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{URL::signedRoute('All Users')}}" class="sidenav-link">
                    <div>Users</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/accountsettings/user-category" class="sidenav-link">
                    <div>Users Category</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/accountsettings/change-user-password" class="sidenav-link">
                    <div>Change User Password</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="/permissions/users-for-permissions" class="sidenav-link">
                    <div>Permissions</div>
                </a>
            </li>
        </ul>
    </li>
</ul> --}}
<ul class="sidenav-inner py-1">

    <!-- Dashboards -->
    <li @if (\Request::route()->getName() == 'Dashboard') class="sidenav-item active" @else class="sidenav-item" @endif>
        <a href="/dashboard" class="sidenav-link">
            <i class="sidenav-icon feather icon-home"></i>
            <div>Dashboards</div>
        </a>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-user"></i>
            <div>Students</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Students') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/class" class="sidenav-link">
                    <div>Class</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Year') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/year" class="sidenav-link">
                    <div>Year</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Attendance') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/attendance" class="sidenav-link">
                    <div>Attendance</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Permission') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/students/pupils-permission" class="sidenav-link">
                    <div>Pupils Permission</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-user"></i>
            <div>Staff</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Teaching Staff') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/teaching-staff" class="sidenav-link">
                    <div>Teaching Staff</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Non Teaching Staff') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/non-teaching-staff" class="sidenav-link">
                    <div>Non Teaching Staff</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Staff Permission Requests') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/permissions/all-staff-permission-requests" class="sidenav-link">
                    <div>Staff Permissions</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Permission Requests') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/permissions/all-students-permission-requests" class="sidenav-link">
                    <div>Students Permissions</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Requested Permissions') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/request-for-permission" class="sidenav-link">
                    <div>Request For Permissions</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'My Requested Permission') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/staff/my-permission-requests" class="sidenav-link">
                    <div>My Requested Permission</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-layout"></i>
            <div>Teaching</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Classes') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/class/classes" class="sidenav-link">
                    <div>Classes</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'subjects') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/subject/subjects" class="sidenav-link">
                    <div>Subjects</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Library') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/library/library" class="sidenav-link">
                    <div>Library</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'TimeTable') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/timetable/timetable" class="sidenav-link">
                    <div>Timetable</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-briefcase"></i>
            <div>Finance</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Fees Structure') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/fees/fees-structure" class="sidenav-link">
                    <div>Fee Structure</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'School Fees') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/fees/school-fees" class="sidenav-link">
                    <div>Fees</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-file-plus"></i>
            <div>Examinations</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Examination') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/reportcard/examinations" class="sidenav-link">
                    <div>Enter Results</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Generate Primary Report Cards') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/reportcard/generate-primary-report-card" class="sidenav-link">
                    <div>Primary Report Cards</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Generate Nursery Report Cards') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/reportcard/generate-nursery-report-card" class="sidenav-link">
                    <div>Nursery Report Crads</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Holiday Package') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/reportcard/holiday-package" class="sidenav-link">
                    <div>Holiday Package</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Ple Results') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/reportcard/ple-results" class="sidenav-link">
                    <div>PLE Results</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-external-link"></i>
            <div>Expenditures</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Items') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/expenditure/items" class="sidenav-link">
                    <div>Items</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Items Requested') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/expenditure/my-item-requests" class="sidenav-link">
                    <div>My Requests</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Office Items Requested') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/expenditure/requested-items-in-your-office" class="sidenav-link">
                    <div>Items Requested</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Expenditures') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/expenditure/expenditure" class="sidenav-link">
                    <div>Expenditure</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Salaries') class="sidenav-item open active" @else class="sidenav-item" @endif>
                <a href="/expenditure/salaries" class="sidenav-link">
                    <div>Salaries</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-plus-circle"></i>
            <div>Nurse</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Nurses Requests') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/nurse/request-for-sickbay-items" class="sidenav-link">
                    <div>Request For Items</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Nurse Records') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/nurse/records" class="sidenav-link">
                    <div>Sickbay-Records</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-shopping-cart"></i>
            <div>Carteen</div>
        </a>
        <ul class="sidenav-menu">
        <li @if (\Request::route()->getName() == 'Cash Deposits') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/carteen/deposit-money" class="sidenav-link">
                    <div>Deposit Students Cash</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Students Daily Spendings') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/carteen/daily-spendings" class="sidenav-link">
                    <div>Daily-Records</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-package"></i>
            <div>Store</div>
        </a>
        <ul class="sidenav-menu">
        <li @if (\Request::route()->getName() == 'Food Usage') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/store/food" class="sidenav-link">
                    <div>Food</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Director Of Studies') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/store/office-of-dos" class="sidenav-link">
                    <div>Office Of Dos</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-layers"></i>
            <div>About Us</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Admin About') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/about/team" class="sidenav-link">
                    <div>Team</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Faq') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/about/faq" class="sidenav-link">
                    <div>FAQ</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-box"></i>
            <div>Services</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Events') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/services/events" class="sidenav-link">
                    <div>Events</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Service') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/services/service" class="sidenav-link">
                    <div>Services</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Other Services') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/services/other-services" class="sidenav-link">
                    <div>Other Services</div>
                </a>
            </li>
        </ul>
    </li>
    <li  @if (\Request::route()->getName() == 'Portfolio') class="sidenav-item active" @else class="sidenav-item" @endif>
            <a href="/portfolio/blog" class="sidenav-link">
                <i class="sidenav-icon feather icon-activity"></i>
                <div>Portfolio</div>
            </a>
    </li>
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-mail"></i>
            <div>Messages</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'Messages') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/contact/messages" class="sidenav-link">
                    <div>Messages</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Parent Messages') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/contact/parents-messages" class="sidenav-link">
                    <div>Parents Messages</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Pages -->
    <li class="sidenav-item">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-settings"></i>
            <div>Account Settings</div>
        </a>
        <ul class="sidenav-menu">
            <li @if (\Request::route()->getName() == 'All Users') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="{{URL::signedRoute('All Users')}}" class="sidenav-link">
                    <div>Users</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Category') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/accountsettings/user-category" class="sidenav-link">
                    <div>Users Category</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Change Password') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/accountsettings/change-user-password" class="sidenav-link">
                    <div>Change User Password</div>
                </a>
            </li>
            <li @if (\Request::route()->getName() == 'Users Categories') class="sidenav-item active" @else class="sidenav-item" @endif>
                <a href="/permissions/users-for-permissions" class="sidenav-link">
                    <div>Permissions</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
