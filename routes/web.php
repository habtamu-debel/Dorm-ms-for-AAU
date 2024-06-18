<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RoomMaintenanceController;
use App\Http\Controllers\BuildingMaintenanceController;
use App\Http\Controllers\ResourceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/staffDisplay', function () {
    return view('staffDisplay');
})->name('staffDisplay');



Route::get('proctorHome', function () {
    return view('proctor.proctorHome');
})->name('proctorHome');


Route::get('/proctorHome', function () {
    return view('proctor\proctorHome');
})->name('proctorHome');


Route::get('/registrarHome', function () {
    return view('registrar.registrarHome');
})->name('registrar.registrarHome');

Route::get('Admin\adminHome', function () {
    return view('Admin\adminHome');
})->name('adminHome');

Route::get('/studentHome', function () {
    return view('students.studentHome');
})->name('studentHome');

Route::get('/proctorManagerHome', function () {
    return view('proctor Manager.proctorManagerHome');
})->name('proctorManagerHome');

Route::get('/deanOfStudentHome', function () {
    return view('Dean of Student.deanOfStudentHome');
})->name('deanOfStudentHome');


Route::get('/home', function () {
    return view('students.home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/announcements', function () {
    return view('announcements');
})->name('announcements');

Route::get('/contact', function () {
    return view('contactUs');
})->name('contactUs');

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/allocate', function () {
    return view('proctor.allocate');
})->name('allocate');

Route::get('/roomRegister', function () {
    return view('proctor.roomRegister');
})->name('roomRegister');

Route::get('/viewAnnouncment', function () {
    return view('proctor.viewAnnouncmentP');
})->name('viewAnnouncment');

Route::get('/postAnnouncment', function () {
    return view('proctor.postAnnouncment');
})->name('postAnnouncment');

Route::get('/studentInfo', function () {
    return view('proctor.studentInfo');
})->name('studentInfo');

Route::get('/buildingMaintenance', function () {
    return view('proctor.buildingMaintenance');
})->name('buildingMaintenance');

Route::get('/manageRequest', function () {
    return view('students.manageRequest');
})->name('students.manageRequest');

Route::get('/reportDisplay', function () {
    return view('proctor.reportDisplay');
})->name('proctor.reportDisplay');


Route::get('/lostAndFound', function () {
    return view('students.lostAndFound');
})->name('students.lostAndFound');

Route::get('/clearance', function () {
    return view('students.clearance');
})->name('students.clearance');

Route::get('/emergency', function () {
    return view('students.emergency');
})->name('students.emergency');

Route::get('/specialAccomodation', function () {
    return view('students.specialAccomodation');
})->name('students.specialAccomodation');

Route::get('/dormChange', function () {
    return view('students.dormChange');
})->name('students.dormChange');

Route::get('/resourceExit', function () {
    return view('students.resourceExit');
})->name('students.resourceExit');

Route::get('/proctorRequest', function () {
    return view('proctor.proctorRequest');
})->name('proctorRequest');

Route::get('/blockRegister', function () {
    return view('proctor.blockRegister');
})->name('blockRegister');

Route::get('/generateReport', function () {
    return view('proctor.generateReport');
})->name('generateReport');

Route::get('/dormCheckIn', function () {
    return view('students.dormCheckIn');
})->name('dormCheckIn');

Route::get('/manageRequest', function () {
    return view('students.manageRequest');
})->name('students.manageRequest');


Route::get('/responseRequest', function () {
    return view('proctor.responseRequest');
})->name('proctor.responseRequest'); 

Route::get('/updateStatus', function () {
    return view('proctor.updateStatus');
})->name('proctor.updateStatus'); 

Route::get('/manageRequest', function () {
    return view('students.manageRequest');
})->name('manageRequest'); 

Route::get('/roomMaintenance', function () {
    return view('students.roomMaintenance');
})->name('students.roomMaintenance');

Route::get('/roomMaintenanceMyRequests', function () {
    return view('students.roomMaintenanceMyRequests');
})->name('students.roomMaintenanceMyRequests');


Route::get('/postAnnouncmentPM', function () {
    return view('proctor Manager.postAnnouncmentPM');
})->name('proctor Manager.postAnnouncmentPM');

Route::get('/postAnnouncmentPMEdit', function () {
    return view('proctor Manager.postAnnouncmentPMEdit');
})->name('proctor Manager.postAnnouncmentPMEdit');

Route::get('/feedback', function () {
    return view('students.feedback');
})->name('students.feedback');

Route::get('/feedback', function () {
    return view('proctor.feedbackDisplay');
})->name('proctor.feedbackDisplay'); 

Route::get('/showStaffs', function () {
    return view('Admin.showStaffs');
})->name('showStaffs'); 

Route::get('/PMreport', function () {
    return view('proctor Manager.PMreport');
})->name('PMreport'); 

Route::get('/feedbackSuccess', function () {
    return view('students.feedbackSuccess');
})->name('students.feedbackSuccess');


Route::get('/feedbackProctor', function () {
    return view('proctor.feedbackProctor');
})->name('proctor.feedbackProctor');

Route::get('/proctorFeedbackDisplay', function () {
    return view('proctor Manager.proctorFeedbackDisplay');
})->name('proctor Manager.proctorFeedbackDisplay');

Route::get('/maintenancePrint', function () {
    return view('proctor.maintenancePrint');
})->name('proctor.maintenancePrint');

Route::get('/feedback', function () {
    return view('Dean Of Student.feedback');
})->name('Dean Of Student.feedback');


Route::get('/feedbackSuccess', function () {
    return view('Dean Of Student.feedbackSuccess');
})->name('Dean Of Student.feedbackSuccess');


Route::get('/proctorDirectorHome', function () {
    return view('proctor Director.proctorDirectorHome');
})->name('proctorDirectorHome');


Route::get('/Registrar', function () {
    return view('Registrar.registrarHome');
})->name('registrarHome');

Route::get('/FeedbackSuccess', function () {
    return view('students.feedbackSuccess');
})->name('students.feedbackSuccess');


Route::get('/Rule and Regulations', function () {
    return view('students.ruleAndRegulation');
})->name('students.ruleAndRegulation');

Route::get('/students/success', function () {
    return view('students.successed');
})->name('students.successed');

Route::get('/announcement/success', function () {
    return view('proctor.announcementSuccess');
})->name('proctor.announcementSuccess');

Route::get('/Rule and Regulations', function () {
    return view('proctor.ruleAndRegulation');
})->name('proctor.ruleAndRegulation');


// Route::get('/adminRegist
// Route::get('/adminRegister', function () {
//     return view('admin\adminRegister');
// })->name('adminRegister');


use App\Http\Controllers\Auth\LoginController;
// routes/web.php

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);


Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/show', [AdminController::class, 'showStaffs'])->name('admin.showStaffs');


// routes/web.php

Route::get('/admin/success', function () {
    return view('admin.success');
})->name('admin.success');



use App\Http\Controllers\staffController;
use App\Htttp\Controller\PostAnnouncmentController;



Route::get('/staffs', [StaffController::class, 'index'])->name('staffs.index');
Route::get('/{staff}/edit', [StaffController::class, 'edit'])->name('staffs.edit');
Route::put('/{staff}/update', [StaffController::class, 'update'])->name('staffs.update');

Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staffs.destroy');
Route::get('/StaffRegister', [StaffController::class, 'destination'])->name('StaffRegister');



Route::post('/staff/staffHome', function () {
    return view('staffHome');
})->name('staffHome');


Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcment/index', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcment/indexx', [AnnouncementController::class, 'indexx'])->name('proctorAnnouncement.indexx');
Route::get('/announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::delete('/announcement/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
Route::put('/announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');

use App\Http\Controllers\RoomController;


Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/rooms/index', [RoomController::class, 'index'])->name('rooms.index');

Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
Route::get('/rooms/{room}', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
Route::get('/room-register', [RoomController::class, 'roomRegister'])->name('roomRegister');

use App\Http\Controllers\proctorRequestController;
Route::post('/proctor-request', [ProctorRequestController::class,'store'])->name('proctor-request.store');

Route::get('/proctor-requests', [ProctorRequestController::class,'index'])->name('proctor-requests.index');
Route::get('/proctor-requests/{proctorRequest}/edit',[ProctorRequestController::class,'edit'])->name('proctor-requests.edit');
Route::put('/proctor-requests/{proctorRequest}', [ProctorRequestController::class, 'update'])->name('proctor-requests.update');
// routes/web.php

use App\Http\Controllers\ReportController;

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/index', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/indexx', [ReportController::class, 'indexx'])->name('reports.indexx');
Route::get('/reports/{reportid}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::delete('/reports/{reportid}', [ReportController::class, 'destroy'])->name('reports.destroy');
Route::put('/reports/{reportid}', [ReportController::class, 'update'])->name('reports.update');


use App\Http\Controllers\BlockController;
Route::post('/block/store', [BlockController::class, 'store'])->name('block.store');
Route::post('/registerBlock', [BlockController::class, 'blockStore'])->name('blockStore');
Route::get('/blocks/{block}', [BlockController::class, 'edit'])->name('blocks.edit');
Route::delete('/blocks/{block}', [BlockController::class, 'destroy'])->name('blocks.destroy');
Route::put('/blocks/{block}', [BlockController::class, 'update'])->name('blocks.update');
Route::get('/blocks', [BlockController::class, 'index'])->name('blocks.index');

Route::get('/blocks', [BlockController::class, 'index'])->name('blocks.index');



use App\Http\Controllers\DormCheckInController;

Route::match(['get', 'post'], '/rooms', [DormCheckInController::class, 'show'])->name('room.show');
Route::post('/rooms/{roomNumber}/confirm', [DormCheckInController::class, 'confirm'])->name('room.confirm');
Route::post('/rooms/{roomNumber}/objection', [DormCheckInController::class, 'objection'])->name('room.objection');






Route::post('/maintenance', [RoomMaintenanceController::class, 'store'])->name('maintenance.store');
// Show the edit form for a specific room maintenance item
Route::get('/roomMaintenance/{id}/edit',[RoomMaintenanceController::class,'edit'])->name('roomMaintenance.edit');
Route::get('/roomMaintenance/{id}/edittt',[RoomMaintenanceController::class,'edittt'])->name('roomMaintenance.edittt');
Route::put('/roomMaintenance/{id}/update',[RoomMaintenanceController::class,'update'])->name('roomMaintenance.update');
Route::put('/roomMaintenance/{id}/modify',[RoomMaintenanceController::class,'modify'])->name('roomMaintenance.modify');
Route::get('roomMaintenance/index', [RoomMaintenanceController::class, 'index'])->name('roomMaintenance.index');
// web.php
Route::get('/roomMaintenance/all', [RoomMaintenanceController::class, 'showAllRequests'])->name('roomMaintenance.all');
// web.php or api.php
Route::delete('/roomMaintenance/{id}', [RoomMaintenanceController::class, 'destroy'])->name('roomMaintenance.destroy');
Route::get('/sendRequest/{id}', [RoomMaintenanceController::class, 'sendRequest'])->name('roomMaintenance.sendRequest');



Route::put('/room-maintenance/{id}/update-status', [RoomMaintenanceController::class, 'updateStatus'])->name('room-maintenance.update-status');
Route::get('/roomMaintenance/{id}/status',[RoomMaintenanceController::class,'show'])->name('roomMaintenance.show');
Route::get('/roomMaintenance/myRequest',[RoomMaintenanceController::class,'roomMyRequests'])->name('roomMaintenance.roomMyRequests');
Route::get('/roomMaintenance/{id}',[RoomMaintenanceController::class,'showResponse'])->name('roomMaintenance.showResponse');

Route::put('/roomMaintenance/{id}/response',[RoomMaintenanceController::class,'submitResponse'])->name('roomMaintenance.submitResponse');


use App\Http\Controllers\postAnnouncementPMController;
Route::get('/announcement/create', [postAnnouncementPMController::class, 'create'])->name('announcementPM.create');
Route::post('/announcement/store', [postAnnouncementPMController::class, 'store'])->name('announcementPM.store');
Route::get('/ViewAnnouncment', [postAnnouncementPMController::class, 'index'])->name('announcementPM.index');
Route::get('/announcement/{id}/edit', [PostAnnouncementPMController::class, 'edit'])->name('announcementPM.edit');
Route::delete('/announcement/{id}', [PostAnnouncementPMController::class, 'destroy'])->name('announcementPM.destroy');
Route::put('/announcement/{id}', [PostAnnouncementPMController::class, 'update'])->name('announcementPM.update');
Route::get('/announcment', [postAnnouncementPMController::class, 'indexx'])->name('announcementPM.indexx');



use App\Http\Controllers\FeedbackController;

Route::get('/feedback/home',[ FeedbackController::class,'home'])->name('feedback.home');
Route::get('/feedbacks/proctor',[ FeedbackController::class,'PMhome'])->name('feedback.proctor');
Route::get('/feedbacks',[ FeedbackController::class,'Registrarhome'])->name('feedback.dean');
Route::post('/feedback/submit',[ FeedbackController::class,'submit'])->name('feedback.submit');



Route::get('/feedback/show', [FeedbackController::class, 'show'])->name('feedback.show');



use App\Http\Controllers\PmFeedbackController;

Route::post('/pmfeedback/store',[ PmFeedbackController::class,'store'])->name('pmfeedback.store');
Route::get('/pmfeedback/show', [PmFeedbackController::class, 'show'])->name('pmfeedback.show');
Route::get('/pmfeedback/home', [PmFeedbackController::class, 'home'])->name('pmfeedback.home');

use App\Http\Controllers\ContactController;
Route::post('/contact', [ContactController::class,'submitForm']);

// web.php
use App\Http\Controllers\ProfileController;
Route::get('/profile/create', [ProfileController::class,'create'])->name('profile.create');
Route::get('/profile/show', [ProfileController::class,'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class,'store'])->name('profile.store');



use App\Http\Controllers\PMreportController;

Route::get('/pmreports', [PMreportController::class, 'index'])->name('pmreports.index');
Route::get('/pmreports/indexx', [PMreportController::class, 'indexx'])->name('pmreports.indexx');
Route::get('/pmreports/create', [PMreportController::class, 'create'])->name('pmreports.create');
Route::post('/pmreports/store', [PMreportController::class, 'store'])->name('pmreports.store');
Route::get('/pmreports/{pmreport}', [PMreportController::class, 'show'])->name('pmreports.show');
Route::get('/pmreports/{pmreport}/edit', [PMreportController::class, 'edit'])->name('pmreports.edit');
Route::put('/pmreports/{pmreport}', [PMreportController::class, 'update'])->name('pmreports.update');
Route::delete('/pmreports/{pmreport}', [PMreportController::class, 'destroy'])->name('pmreports.destroy');
// routes/web.php
use App\Http\Controllers\ViewDormController;
Route::post('/students/viewDorm', [ViewDormController::class,'viewDorm'])->name('students.viewDorm');



Route::get('/buildingmaintenance', [BuildingMaintenanceController::class,'home'])->name('buildingmaintenance.home');
Route::post('/buildingmaintenance/store', [BuildingMaintenanceController::class,'store'])->name('buildingmaintenance.store');

use App\Http\Controllers\DeanAnnouncementController;

Route::get('/deanAnnouncement/create', [DeanAnnouncementController::class, 'create'])->name('deanAnnouncement.create');
Route::post('/deanAnnouncement/store', [DeanAnnouncementController::class, 'store'])->name('deanAnnouncement.store');
Route::get('/deanAnnouncment/index', [DeanAnnouncementController::class, 'index'])->name('deanAnnouncement.index');
Route::get('/deanAnnouncment/views', [DeanAnnouncementController::class, 'indexx'])->name('deanAnnouncementtt.views');
Route::get('/deanAnnouncement/edit/{id}', [DeanAnnouncementController::class, 'edit'])->name('deanAnnouncement.edit');
Route::delete('/deanAnnouncement/destroy/{id}',[DeanAnnouncementController::class, 'destroy'])->name('deanAnnouncement.destroy');
Route::put('/deanAnnouncement/update/{id}', [DeanAnnouncementController::class, 'update'])->name('deanAnnouncement.update');


use App\Http\Controllers\DeanFeedbackController;
Route::post('/deanFeedback/store', [DeanFeedbackController::class, 'store'])->name('deanFeedback.store');
Route::get('/deanFeedback/home', [DeanFeedbackController::class, 'home'])->name('deanFeedback.home');

use App\Http\Controllers\DeanReportController;
Route::get('/deanReport/create', [DeanReportController::class, 'create'])->name('deanReport.create');
Route::post('/deanReport/store', [DeanReportController::class, 'store'])->name('deanReport.store');
Route::get('/deanReport/index', [DeanReportController::class, 'index'])->name('deanReport.index');
Route::get('/deanReport/indexx', [DeanReportController::class, 'indexx'])->name('deanReport.indexx');
Route::get('/deanReport/edit/{id}', [DeanReportController::class, 'edit'])->name('deanReport.edit');
Route::delete('/deanReport/destroy/{id}',[DeanReportController::class, 'destroy'])->name('deanReport.destroy');
Route::put('/deanReport/update/{id}', [DeanReportController::class, 'update'])->name('deanReport.update');

use App\Http\Controllers\DirectorAnnouncementController;
Route::get('/directorAnnouncement/create', [DirectorAnnouncementController::class, 'create'])->name('directorAnnouncement.create');
Route::post('/directorAnnouncement/store', [DirectorAnnouncementController::class, 'store'])->name('directorAnnouncement.store');
Route::get('/Announcment/index', [DirectorAnnouncementController::class, 'index'])->name('directorAnnouncement.index');
Route::get('/Announcment/indexx', [DirectorAnnouncementController::class, 'indexx'])->name('directorAnnouncement.indexx');
Route::get('/directorAnnouncement/edit/{id}', [DirectorAnnouncementController::class, 'edit'])->name('directorAnnouncement.edit');
Route::delete('/directorAnnouncement/destroy/{id}',[DirectorAnnouncementController::class, 'destroy'])->name('directorAnnouncement.destroy');
Route::put('/directorAnnouncement/update/{id}', [DirectorAnnouncementController::class, 'update'])->name('directorAnnouncement.update');


use App\Http\Controllers\DirectorReportController;
Route::get('/directorReport/create', [DirectorReportController::class, 'create'])->name('directorReport.create');
Route::post('/directorReport/store', [DirectorReportController::class, 'store'])->name('directorReport.store');
Route::get('/directorReport/index', [DirectorReportController::class, 'index'])->name('directorReport.index');
Route::get('/directorReport/indexx', [DirectorReportController::class, 'indexx'])->name('directorReport.indexx');
Route::get('/directorReport/edit/{id}', [DirectorReportController::class, 'edit'])->name('directorReport.edit');
Route::delete('/directorReport/destroy/{id}',[DirectorReportController::class, 'destroy'])->name('directorReport.destroy');
Route::put('/directorReport/update/{id}', [DirectorReportController::class, 'update'])->name('directorReport.update');


use App\Http\Controllers\RegistrarAnnouncementController;
Route::get('/registrarAnnouncement/create', [RegistrarAnnouncementController::class, 'create'])->name('registrarAnnouncement.create');
Route::post('/registrarAnnouncement/store', [RegistrarAnnouncementController::class, 'store'])->name('registrarAnnouncement.store');
Route::get('/ViewAnnouncment/index', [RegistrarAnnouncementController::class, 'index'])->name('registrarAnnouncement.index');
Route::get('/ViewAnnouncment/indexx', [RegistrarAnnouncementController::class, 'indexx'])->name('registrarAnnouncement.indexx');
Route::get('/registrarAnnouncement/edit/{id}', [RegistrarAnnouncementController::class, 'edit'])->name('registrarAnnouncement.edit');
Route::delete('/registrarAnnouncement/destroy/{id}',[RegistrarAnnouncementController::class, 'destroy'])->name('registrarAnnouncement.destroy');
Route::put('/registrarirectorAnnouncement/update/{id}', [RegistrarAnnouncementController::class, 'update'])->name('registrarAnnouncement.update');



use App\Http\Controllers\StudentController;
Route::get('/Students', [StudentController::class, 'showStudents'])->name('showStudents');
Route::get('/Info', [StudentController::class, 'studentsInfo'])->name('studentsInfo');
Route::get('/Students/PD', [StudentController::class, 'viewStudents'])->name('viewStudents');
Route::get('/Students/PM', [StudentController::class, 'PMshowStudents'])->name('PMshowStudents');
Route::post('/Students', [StudentController::class, 'showStudents'])->name('proctor_student_lists.store');
Route::post('/send-filtered-students',[StudentController::class, 'sendFilteredStudents'])->name('send-filtered-students');
Route::post('/send-filtered-students/PM',[StudentController::class, 'PMsendFilteredStudents'])->name('approve-filtered-students');
Route::post('/PDsend-filtered-students',[StudentController::class, 'PDsendFilteredStudents'])->name('PDsend-filtered-students');
Route::get('/showStudents',[StudentController::class, 'studentList'])->name('showStudentsList');
Route::get('/viewDorm',[StudentController::class, 'viewDorm'])->name('viewDorm');
Route::get('/allocate/{id}', [StudentController::class, 'assignDorm'])->name('assign-dorm');





Route::post('/allocate',[StudentController::class, 'allocate'])->name('allocate');
Route::get('/getrooms',[StudentController::class, 'getRooms'])->name('get-rooms');

use App\Http\Controllers\ProcorController;

Route::post('/save-to-proctor', [ProcorController::class, 'saveToProctor']);



use App\Http\Controllers\LostAndFoundController;
Route::post('/lostandfound/store', [LostAndFoundController::class, 'store'])->name('lostandfound.store');
Route::get('/lostandfound/create', [LostAndFoundController::class, 'create'])->name('lostandfound.create');

Route::get('/lostandfound/index', [LostAndFoundController::class, 'index'])->name('lostandfound.index');
Route::get('/lostandfound/indexx', [LostAndFoundController::class, 'indexx'])->name('lostandfound.indexx');
Route::get('/lostandfound/edit/{id}', [LostAndFoundController::class, 'edit'])->name('lostandfound.edit');
Route::delete('/lostandfound/destroy/{id}',[LostAndFoundController::class, 'destroy'])->name('lostandfound.destroy');
Route::put('/lostandfound/update/{id}', [LostAndFoundController::class, 'update'])->name('lostandfound.update');
Route::get('/lostandfound/all', [LostAndFoundController::class, 'lostandfound'])->name('lostandfound.all');
Route::get('/lostandfound/posts/{id}', [LostAndFoundController::class, 'posts'])->name('lostandfound.post');
Route::get('/lostandfound/postStudent', [LostAndFoundController::class, 'postStudent'])->name('lostandfound.postStudent');
Route::put('/claimItem/{id}/store',[LostAndFoundController::class, 'claimStore'])->name('claimItem.store');

Route::get('/claimItem/{id}',[LostAndFoundController::class, 'showClaim'])->name('claimItem');


 




Route::get('/resource-exit/create', [ResourceController::class,'create'])->name('resource-exit.create');
Route::post('/resource-exit', [ResourceController::class, 'store'])->name('resource-exit.store');
Route::get('/resource-exit/show', [ResourceController::class, 'show'])->name('resource-exit.show');
Route::get('/resource-exit/home', [ResourceController::class, 'home'])->name('resource-exist.all');
Route::put('/resource-exit/{id}/update-confirmation', [ResourceController::class, 'updateConfirmation'])->name('resource.update-confirmation');
Route::get('/resource-exit/{id}/confirm',[ResourceController::class,'confirm'])->name('resource.confirm');


use App\Http\Controllers\ClearanceController;
// web.php
Route::post('/clearance', [ClearanceController::class, 'store'])->name('clearance.store');
Route::get('/clearance/index', [ClearanceController::class, 'index'])->name('clearances.index');
Route::get('/clearance/edit/{id}', [ClearanceController::class, 'edit'])->name('clearances.edit');

Route::get('/clearance/all', [ClearanceController::class, 'clearance'])->name('clearanceResponse.all');

Route::put('/clearance/update/{id}', [ClearanceController::class, 'update'])->name('clearances.update');
Route::get('/clearance/{id}',[ClearanceController::class,'showResponse'])->name('clearance.showResponse');
Route::put('/clearance/{id}/response',[ClearanceController::class,'submitResponse'])->name('clearance.submitResponse');


use App\Http\Controllers\DormChangeController;
Route::get('/dorm-changes', [DormChangeController::class, 'index'])->name('dorm-changes.index');
Route::get('/dorm-changes/create', [DormChangeController::class, 'create'])->name('dorm-changes.create');
Route::post('/dorm-changes/store', [DormChangeController::class, 'store'])->name('dorm-changes.store');

Route::get('/dorm-changes/{id}/edit', [DormChangeController::class, 'edit'])->name('dorm-changes.edit');
Route::put('/dorm-changes/{id}', [DormChangeController::class, 'update'])->name('dorm-changes.update');
Route::delete('/dorm-changes/{id}', [DormChangeController::class, 'destroy'])->name('dorm-changes.destroy');

Route::get('/dorm-changes/all', [DormChangeController::class, 'dormChange'])->name('dormChange.all');

use App\Http\Controllers\EmergencyController;
Route::post('/emergency/store', [EmergencyController::class, 'store'])->name('emergency.store');
Route::get('/emergency/index', [EmergencyController::class, 'index'])->name('emergencies.index');
Route::get('/emergency/{id}/edit', [EmergencyController::class, 'edit'])->name('emergencies.edit');
Route::put('/emergency/{id}', [EmergencyController::class, 'edit'])->name('emergencies.update');
Route::get('/emergency/all', [EmergencyController::class, 'emergency'])->name('emergencies.all');


use App\Http\Controllers\SpecialAccommodationController;
Route::post('/accommodation/store', [SpecialAccommodationController::class, 'store'])->name('accommodation.store');
Route::get('/accommodation/index', [SpecialAccommodationController::class, 'index'])->name('accommodation.index');
Route::get('/accommodation/{id}', [SpecialAccommodationController::class, 'edit'])->name('accommodation.edit');
Route::put('/accommodation/{id}', [SpecialAccommodationController::class, 'update'])->name('accommodation.update');
use App\Http\Controllers\ProDirectorController;
Route::get('/specialAccommodate/all', [SpecialAccommodationController::class, 'specialAccommodate'])->name('accommodated.all');
Route::post('/send-selected-students', [ProctoringController::class, 'sendSelectedStudents'])->name('send-selected-students');

// routes/web.php
Route::post('/pro-director/send-selected-students', 'ProDirectorController@sendSelectedStudents')->name('pro-director.send-selected-students');

// routes/web.php
Route::post('/students/allocate', [StudentController::class, 'allocate'])->name('students.allocate');

use App\Http\Controllers\AppointmentController;
Route::get('/appointment/all', [AppointmentController::class, 'create'])->name('appointment.all');
Route::post('/students/store', [AppointmentController::class, 'store'])->name('students.store');
Route::get('/appointment/view', [AppointmentController::class, 'view'])->name('appointment.view');
Route::get('/response/{id}/add', [AppointmentController::class, 'addResponse'])->name('addResponse');
Route::put('/appointment/{id}/response',[AppointmentController::class,'submitResponse'])->name('submitResponse');
Route::get('/appointment/my', [AppointmentController::class, 'my'])->name('appointment.my');

// routes/web.php
