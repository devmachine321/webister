//Variables
var panelName = "Kalzedia Hosting V2";
var panelNotice = '<div class="msg info"><a href="#" class="close">x</a><h5>Hello, Im the panel notice! You can edit me in the engine.js file. With this you can display a custom notice to your clients as long as they have JavaScript enabled.</h5></div>';

//Page title and breadcrumb
var pathname = window.location.pathname;
if (pathname=="/switcher/" || pathname=="/switcher") {
	var pagetitle = "Your Websites&nbsp;<small>Choose one to edit...</small>";
	var breadcrumb = '<li class="active">  >  Websites</li>';
}
else if (pathname=="/profile/" || pathname=="/profile") {
	var pagetitle = "Your Profile&nbsp;<small>Personalise your experience...</small>";
	var breadcrumb = '<li class="active"> > Profile</li>';
}
else if (pathname=="/profile/change/" || pathname=="/profile/change") {
	var pagetitle = "Edit Your Profile&nbsp;<small>Personalise your experience...</small>";
	var breadcrumb = '  >  <li><a href="/profile/">Profile</a></li><li class="active">Edit</li>';
}
else if (pathname=="/profile/change-password/" || pathname=="/profile/change-password") {
	var pagetitle = "Change Your Password&nbsp;<small>Secure your account...</small>";
	var breadcrumb = '  >  <li><a href="/profile/">Profile</a></li><li class="active">Change Password</li>';
}
else if (pathname=="/referral/" || pathname=="/referral") {
	var pagetitle = "Referrals&nbsp;<small>Share us with friends...</small>";
	var breadcrumb = '<li class="active">  >  Referrals</li>';
}
else if (pathname=="/vps/order/" || pathname=="/vps/order") {
	var pagetitle = "Order a VPS&nbsp;<small>Get more server power...</small>";
	var breadcrumb = '<li class="active">  >  VPS</li>';
}
else if (pathname=="/domains-manager/" || pathname=="/domains-manager") {
	var pagetitle = "Your Domains&nbsp;<small>Your presence on the internet...</small>";
	var breadcrumb = '<li class="active">  >  Referrals</li>';
}
else if (pathname=="/knowledgebase/" || pathname=="/knowledgebase") {
	var pagetitle = "Knowledge Base&nbsp;<small>Useful information for you...</small>";
	var breadcrumb = '<li class="active">  >  KnowledgeBase</li>';
}
else if (pathname=="/news/" || pathname=="/news") {
	var pagetitle = "News & Announcements&nbsp;<small>Get the latest information...</small>";
	var breadcrumb = '<li class="active">  >  News</li>';
}
else if (pathname=="/helpdesk/" || pathname=="/helpdesk") {
	var pagetitle = "Help & Support&nbsp;<small>Get support with your services...</small>";
	var breadcrumb = '<li class="active">  >  Support</li>';
}
else {
	var pagetitle = "Control Panel&nbsp;<small>Manage your services with us...</small>";
	var breadcrumb = '<li class="active">  >  Control Panel</li>';
};