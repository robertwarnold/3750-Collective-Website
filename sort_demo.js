// Initialize the counter and the array
var numbernames = 0;
var names = new Array();

function SortNames() {
    var thename = document.theform.newname.value.trim().toUpperCase(); 
    if (thename !== "") {
        names[numbernames] = thename;
        numbernames++;
        names.sort();
        var sortedNames = names.map(function (name, index) {
            return (index + 1) + '. ' + name;
        });

        document.theform.sorted.value = sortedNames.join("\n");
        document.theform.newname.value = ""; 
    }
}

function handleKeyPress(event) {
    if (event.key === "Enter") {
        SortNames();
        event.preventDefault(); 
    }
}
