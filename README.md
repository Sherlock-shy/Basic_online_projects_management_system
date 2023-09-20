<h1># Basic online projects management system</h1>
		

		<h2>This is a project for my basic online project management system Published inside Aston University private server on.</h2>
		

		<h2>This is what you will see when you enter the website:
		![螢幕擷取畫面 (159)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/4f7319a0-1993-4fa4-bdc7-1fe114f20529)</h2>
		

		The website include a search bar for filtering projects, head bar for login/sign up/back to home page and a table showing all projects that are uploaded to the server.
		YOu can simply view each project details by clicking on the title of the project in the list.
		

		![螢幕擷取畫面 (169)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/595c1824-ef53-4376-a018-5401e0fc573b)
		

		

		# Register user VS Guest
		

		You won't be able to upload any projects if you haven't logged in or a guest only.
		

		Here are the head bar comparions between registered user & Guest user:
		![螢幕擷取畫面 (162)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/2a3660ed-02bc-4ac9-a171-d395cbca843d)
		![螢幕擷取畫面 (163)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/fe3e2188-96de-4e53-9cd2-bab156ea803e)
		

		Guest user can only able to view projects and project details in the web while users can upload, modify proejects they uploaded and view them.
		

		#Register/login
		

		For register, you can easily click on the option on in the head bar, you will be redirect to the register page.
		

		![螢幕擷取畫面 (164)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/0f470d86-35d0-4ff9-8d95-c9ebbbb7a39f)
		

		Or you can login if you are an user in the login page
		

		![螢幕擷取畫面 (161)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/cff70256-d1e3-439b-9691-2a0e280b6936)
		

		There will be a welcome message under the search box after you are logged in, which is "Welcome USERNAME"(my user is submission as this is a ac for submission)
		

		![螢幕擷取畫面 (165)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/88ea46ec-2cdc-4dab-b8df-cfa90a793507)
		

		# Upload/modfy projects 
		

		After you become a user, you can upload/update projects by simply click on upload project/ custom project option in the head bar.
		

		page of uploading project
		

		![螢幕擷取畫面 (166)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/3a3a3c63-366d-4f2d-a783-d19d893b5a04)
		

		page of modfy project
		![螢幕擷取畫面 (167)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/ae69377e-dadb-4ce5-b2cc-92a1c72eadbc)
		

		Here is an exmaple, by using the ac Submissions.
		Here, the drop down manual displayed only the project "Arial gundam" as that is the only project uploaded by this account which is in the development pharse
		

		![螢幕擷取畫面 (170)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/61aa6617-674c-47a9-a740-b8374bb250f7)
		

		Let's say we moved on and now we are in the testing pharse, so we update it.
		After that we will just click the "update project" button at the bottom.
		

		![螢幕擷取畫面 (171)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/a0978a06-85cd-4497-bfdc-fce6cb1b489b)
		

		Updated succesful! We will be redirect back to the project list.
		

		![螢幕擷取畫面 (172)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/f8028cc2-444c-4dfa-846d-acadd585df77)
		

		![螢幕擷取畫面 (173)](https://github.com/Shecklock/Basic_online_projects_management_system/assets/84926502/54148edd-0e08-4235-9421-1198c000da5e)
		

		As you can see in the list, the phase of the project changed to testing.
		

		

		# Brief Description of Technologies and Structure
		

		In the terms of server-side technologies, I used PHP, with MySQL database for data
		storage, and using Visual Studio Code as the working environment. It follows a basic
		MVC pattern, with PHP scripts serving as the controller, HTML and CSS files serving
		as the view, and the database serving as the model.
		In the terms of client-side technologies, I have use HTML, CSS and a little bit
		JavaScript. The system uses the jQuery library for AJAX requests and DOM
		manipulation.
		

		Here are some security features I have implemented:
		

		--Authentication-- 
		

		Source file: login.php, register.php
		

		User authentication is implemented
		in login.php using password hashing
		with PHP's built-in password_hash()
		function and password verification
		with password_verify().
		session_start() is used in all relevant
		pages to enable sessions for user
		authentication.
		

		--CSFR--
		

		Source file: login.php
		CSFR done via login form which
		include a CSRF token as a hidden
		input field by using bin2hex() and
		hash_equals() functions.
		

		--Handling
		injections--
		

		Source file: register.php, login.php,
		connectdb.php
		customproject.php,
		searchbar.php,
		index.php
		

		SQL injection prevention is
		implemented in both register.php
		and login.php using prepared
		statements with parameter binding
		to sanitize user input and prevent
		SQL injection attacks.
		HTML injection prevention is also
		implemented in registerform.php
		and loginform.php by escaping user
		input using PHP’s htmlspecialcahrs()
		function to prevent cross-site
		scripting (XSS) attack.
		

		--Authorisation--
		

		Source file: uploadproject.php,
		customproject.php
		

		Only registered user who logged in
		can use upload project and edit
		project function
		

		--Form validation-- 
		

		Source file: uploadproject.php,
		register.php:
		

		Basic form validation is implemented
		in register.php and login.php using
		PHP’s build-in isset() to check for
		form input and empty() function to
		check for empty input fields.
		

		--Password hashing--
		

		Source file: register.php
		

		User’s password is hashed using
		the password_hash() function before
		being inserted into database.
		

		To conclude, it is a basic web application system using traditional server-side
		rendering with some AJAX functionality for improved user experience.

