<?php

return [

    /* ***********************
    * Navigation
    *********************** */
    'page' => 'WORKING',
    'timesheet' => 'Timesheets',
    'users' => 'Users',
    'profile' => 'Profile',
    'logout' => 'Log out',

    // Admin
    'payroll' => 'Payroll',
    'managers' => 'Managers',
    'settings' => 'Settings',

    // Manager
    'urgent-requests' => 'Urgent requests',
    'check-by-date' => 'Daily timesheets',
    'fixes' => 'Amendments',

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
    'table-starts' => 'WEEK BEGINNING',
    'table-ends' => 'WEEK ENDING',
    'table-salaries' => 'SALARIES',
    'table-fixes' => 'AMENDMENTS',
    'table-total' => 'TOTAL',
    'table-show' => 'TIMESHEET',
    'table-status' => 'STATUS',

    'status-current' => 'CURRENT',
    'status-approved' => 'APPROVED',
    'pending-requests' => 'pending approvals',

    'button-approve' => 'APPROVE AND SUBMIT',

    'week' => 'Week',

    'by-user' => 'By user',
    'by-day' => 'By day',
    'only-fixes' => 'Amendments',

    'date' => 'DATE',
    'day' => 'WEEKDAY',
    'status' => 'STATUS',
    'earned' => 'PAY',
    'worked' => 'SHIFT COVERED',

    'status-not-submitted' => 'NOT SUBMITTED',
    'status-cancelled' => 'REJECTED',
    'status-waiting-approval' => 'AWAITING APPROVAL',

    'day-shift' => 'Day shift',
    'night-shift' => 'Night shift',

    'table-fix' => 'AMENDMENT',

    'comment' => 'Comment:',
    'total' => 'TOTAL:',

    'table-user' => 'USER',
    'table-worked' => 'SHIFT COVERED',
    'table-earned' => 'PAY',
    'table-sum' => 'AMOUNT',
    'table-comment' => 'COMMENTS',

    // Managers

    'button-add-manager' => 'Add manager',
    'table-name' => 'NAME',
    'table-email' => 'E-MAIL',
    'table-phone' => 'PHONE',
    'table-actions' => 'ACTIONS',
    'button-edit' => 'Edit',
    'are-you-sure' => 'Are you sure?',
    'button-delete' => 'Delete',
    'button-reject' => 'Reject',
    'edit-manager' => 'Edit manager',

    'field-name' => 'Name:',
    'field-surname' => 'Surname:',
    'field-email' => 'E-mail:',
    'field-phone' => 'Phone:',
    'field-new-pass' => 'New password:',
    'field-repeat-pass' => 'Repeat password:',

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

    'near-user-fixes' => 'amendment(s)',
    'table-date' => 'DATE',
    'table-day' => 'WEEKDAY',
    'no-urgent-requests' => 'No urgent requests',

    // Timesheet

    'all-users' => 'All users',

    // Check by date

    'change-day' => 'Change day',

    // Fixes

    'select-week-for-fixes' => 'Amendments made for the periods',
    'table-begins' => 'WEEK BEGINNING',
    'add-fix-for-week' => 'Add new',
    'show-fixes' => 'List all',
    'fixes-list-for-week' => 'Amendments list for period',
    'all-weeks' => 'All periods',
    'add-fix-week' => 'Add amendment for period',
    'form-user' => 'User:',
    'form-sum' => 'Amount (£):',
    'form-comment' => 'Comment:',
    'add-this-fix' => 'Add amendment',
    'edit-fix' => 'Edit amendment',
    'save-this-fix' => 'Save changes',
    'fixes-list-for-user' => 'Fixes list for user',
    'show-all-fixes' => 'Show all fixes',
    'period' => 'Period',

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

    'time-submitted' => 'Your shift details have been submitted!',
    'record-approved' => 'Record has been approved!',
    'record-cancelled' => 'Record rejected!',

    // FixesController

    'fix-added' => 'Amendment has been successfully added!',
    'fix-updated' => 'Amendment has been successfully updated!',

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

    'payroll-paid' => 'Payroll period successfully approved',

    // Days

    'days.Sunday' => 'Sunday',
    'days.Saturday' => 'Saturday',
    'days.Friday' => 'Friday',
    'days.Thursday' => 'Thursday',
    'days.Wednesday' => 'Wednesday',
    'days.Tuesday' => 'Tuesday',
    'days.Monday' => 'Monday',

    'search-user' => 'Search user',

    // Password reset

    'reset-password' => 'Reset Password',
    'form-confirm-pass' => 'Confirm Password',
    'button-send-pass-reset' => 'Reset password',

    'table-language' => 'LANGUAGE',
    'form-lang' => 'Language'
];
