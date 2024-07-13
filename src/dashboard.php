<?php
$page_admin = false;
$browser_title = "PHP Fullstack | Dashboard";
$page_header = 'Dashboard';
$custom_styles = [];
$custom_srcs = [];
require_once("/path/to/your/base/directory/env.php");
require_once(PAGE_INIT);
?>

<?php
echo "Session ID: " . session_id();
echo "<br>";
?>

<button id="alert-test-1">
    sweet alert load screen testing
</button>
<button id="alert-test-2">
    sweet alert toast success testing
</button>
<button id="alert-test-3">
    sweet alert toast warning testing
</button>
<button id="alert-test-4">
    sweet alert toast error testing
</button>
<button id="alert-test-5">
    sweet alert modal testing
</button>

<br><br>
<p>
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
</p>
<p>
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
</p>
<p>
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
</p>
<p>
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
This is some paragraph placeholder content. This is a test paragraph to show how text will appear on the screen. Testing Test Test Paragraphs 123 123 123.
</p>


<?php require_once(PAGE_END); ?>

<script>
    $("#alert-test-1").on('click',function(e) {
        e.preventDefault();
        loadScreenStart();
        setTimeout(() => {
            loadScreenEnd();
        }, 5000);
    });
    $("#alert-test-2").on('click',function(e) {
        e.preventDefault();
        SweetToast('This is a success toast test','success');
    });
    $("#alert-test-3").on('click',function(e) {
        e.preventDefault();
        SweetToast('This is a warning toast test','warning');
    });
    $("#alert-test-4").on('click',function(e) {
        e.preventDefault();
        SweetToast('This is an error toast test','error');
    });
    $("#alert-test-5").on('click',function(e) {
        e.preventDefault();
        SweetModal('sweetalert2 modal','/testing.php');
    });
</script>

<?php require_once(HTML_END); ?>
