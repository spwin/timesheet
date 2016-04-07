<?php

return [

    /* ***********************
    * Navigation
    *********************** */
    'page' => 'Working.today',
    'timesheet' => 'Timesheet',
    'users' => 'Users',
    'profile' => 'Profile',
    'logout' => 'Logout',

    // Admin
    'payroll' => 'Payroll',
    'managers' => 'Managers',
    'settings' => 'Settings',

    // Manager
    'urgent-requests' => 'Urgent requests',
    'check-by-date' => 'Check by date',
    'fixes' => 'Fixes',

    // User


    /* ***********************
    * Login
    *********************** */
    'login' => 'Login',
    'e-mail' => 'E-Mail Address',
    'password' => 'Password',
    'remember' => 'Remember Me',
    'login-button' => 'Login',
    'forgot-password' => 'Forgot Your Password?',
    'login-error' => 'There were some problems with your input.',


    /* ***********************
    * Admin
    *********************** */

    // Payroll
    'table-starts' => 'STARTS',
    'table-ends' => 'ENDS',
    'table-salaries' => 'SALARIES',
    'table-fixes' => 'FIXES',
    'table-total' => 'TOTAL',
    'table-show' => 'SHOW',
    'table-status' => 'STATUS',

    'status-current' => 'CURRENT',
    'status-approved' => 'APPROVED',
    'pending-requests' => 'pending requests',

    'button-approve' => 'Approve',

    'week' => 'Week',

    'by-user' => 'By user',
    'by-day' => 'By day',
    'only-fixes' => 'Only fixes',

    'date' => 'DATE',
    'day' => 'DAY',
    'status' => 'STATUS',
    'earned' => 'EARNED',
    'worked' => 'WORKED',

    'status-not-submitted' => 'NOT SUBMITTED',
    'status-cancelled' => 'CANCELLED',
    'status-waiting-approval' => 'WAITING TO BE APPROVED',

    'day-shift' => 'Day shift',
    'night-shift' => 'Night shift',

    'table-fix' => 'FIX',

    'comment' => 'Comment:',
    'total' => 'TOTAL:',

    'table-user' => 'USER',
    'table-worked' => 'WORKED',
    'table-earned' => 'EARNED',
    'table-sum' => 'SUM',
    'table-comment' => 'COMMENT',

    // Managers

    'button-add-manager' => 'Add manager',
    'table-name' => 'NAME',
    'table-email' => 'E-MAIL',
    'table-phone' => 'PHONE',
    'table-actions' => 'ACTIONS',
    'button-edit' => 'Edit',
    'are-you-sure' => 'Are you sure?',
    'button-delete' => 'Delete',
    'edit-manager' => 'Edit manager',

    'field-name' => 'Name:',
    'field-surname' => 'Surname:',
    'field-email' => 'E-mail:',
    'field-phone' => 'Phone:',
    'field-new-pass' => 'New password:',
    'field-repeat-pass' => 'Repeat new password:',

    'button-update-manager' => 'Update manager data',

    'create-manager' => 'Create manager',
    'field-password' => 'Password:',
    'button-create-manager' => 'Create manager',


    // Users

    'button-add-user' => 'Add user',
    'edit-user' => 'Edit user',
    'button-update-user' => 'Update user data',
    'create-user' => 'Create user',
    'button-create-user' => 'Create user',

    // Settings

    'setting-day_fare' => 'Day fare:',
    'setting-night_fare' => 'Night fare:',
    'setting-start_date' => 'Start date:',
    'setting-emails' => 'Send emails:',
    'button-update-info' => 'Update info',

    // Profile

    'profile-edit' => 'Profile edit',
    'button-update' => 'Update',


    /* ***********************
    * Manager
    *********************** */

    // Urgent requests

    'near-user-fixes' => 'fixes',
    'table-date' => 'DATE',
    'table-day' => 'DAY',
    'no-urgent-requests' => 'No urgent requests',

    // Timesheet

    'all-users' => 'All users',

    // Check by date

    'change-day' => 'Change day',

    // Fixes

    'select-week-for-fixes' => 'Select week for fixes',
    'table-begins' => 'BEGINS',
    'add-fix-for-week' => 'Add fix for this week',
    'show-fixes' => 'Show fixes',
    'fixes-list-for-week' => 'Fixes list for week',
    'all-weeks' => 'All weeks',
    'add-fix-week' => 'Add fix for week',
    'form-user' => 'User:',
    'form-sum' => 'Sum (£):',
    'form-comment' => 'Comment:',
    'add-this-fix' => 'Add this fix',
    'edit-fix' => 'Edit fix',
    'save-this-fix' => 'Save this fix',
    'fixes-list-for-user' => 'Fixes list for user',
    'show-all-fixes' => 'Show all fixes',

    // Users

    // Profile


    /* ***********************
    * User
    *********************** */

    // Timesheet

    'button-resubmit' => 'Resubmit',
    'button-submit' => 'Submit',


    /* ***********************
    * Controllers messages
    *********************** */

    // DayController

    'time-submitted' => 'Your time has been submitted!',
    'record-approved' => 'Record has been approved!',
    'record-cancelled' => 'Record cancelled!',

    // FixesController

    'fix-added' => 'Fix has been successfully added!',
    'fix-updated' => 'Fix is successfully updated!',

    // ManagerController

    'manager-added' => 'New manager successfully added!',
    'manager-updated' => 'Manager successfully updated!',
    'manager-deleted' => 'Manager deleted!',

    // SettingsController

    'settings-updated' => 'Settings successfully updated!',

    // TimesheetController

    'information-updated' => 'Your information successfully updated!',

    // UsersController

    'user-added' => 'New user successfully added!',
    'user-updated' => 'User successfully updated!',
    'user-deleted' => 'User deleted!',

    // WeekController

    'payroll-paid' => 'Payroll period successfully marked as paid',

    // Days

    'days.Sunday' => 'Sunday',
    'days.Saturday' => 'Saturday',
    'days.Friday' => 'Friday',
    'days.Thursday' => 'Thursday',
    'days.Wednesday' => 'Wednesday',
    'days.Tuesday' => 'Tuesday',
    'days.Monday' => 'Monday',
];
