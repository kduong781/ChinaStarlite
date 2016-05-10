/**
*Author: Rohit Sehdev
*Description: js for about page
*/

function showStory() {

	document.getElementById("storyDescription").style.display = 'block';
	document.getElementById("locationsDescription").style.display = 'none';
	document.getElementById("ourStory").style.fontSize = '1.7em';
	document.getElementById("locations").style.fontSize = '.35em';
	document.getElementById("ourStory").style.color = "#B80606";
	document.getElementById("locations").style.color = "black";



}

function showLocations() {

	document.getElementById("storyDescription").style.display = 'none';
	document.getElementById("locationsDescription").style.display = 'block';
	document.getElementById("ourStory").style.fontSize = '.35em';
	document.getElementById("locations").style.fontSize = '1.7em';
	document.getElementById("ourStory").style.color = "black";
	document.getElementById("locations").style.color = "#B80606";

}


function showHongKong() {

	document.getElementById("longbeach").style.display = 'none';
	document.getElementById("hongkong").style.display = 'block';
	document.getElementById("longbeachLink").style.fontSize = '1.5em';
	document.getElementById("hongkongLink").style.fontSize = '2.5em';
	document.getElementById("longbeachLink").style.color = "black";
	document.getElementById("hongkongLink").style.color = "#B80606";

}


function showLongBeach() {

	document.getElementById("hongkong").style.display = 'none';
	document.getElementById("longbeach").style.display = 'block';
	document.getElementById("hongkongLink").style.fontSize = '1.5em';
	document.getElementById("longbeachLink").style.fontSize = '2.5em';
	document.getElementById("hongkongLink").style.color = "black";
	document.getElementById("longbeachLink").style.color = "#B80606";

}
