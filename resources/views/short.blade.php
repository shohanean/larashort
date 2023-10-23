<h1>Here is the link</h1>

<!-- The text field -->
<input type="text" value="{{ $final_link }}" id="myInput">

<!-- The button used to copy the text -->
<button onclick="myFunction()">Copy text</button>

<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>
