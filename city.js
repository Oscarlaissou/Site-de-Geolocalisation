/*
	*	By: Baqir Farooq
	*	baqirfarooq@gmail.com

	*	Description:
	*	Inserts Countries & States as Dropdown List
	*	How to Use:

		In Head/Footer section:
		<script type= "text/javascript" src = "countries.js"></script>
		In Body Section:
		Select Country:   <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		City/District/State: <select name ="state" id ="state"></select>
		<script language="javascript">print_country("country");</script>	
	*
	*	Aurthor's Website: https://baqirfarooq.wordpress.com/
	*
*/

// Initialisation de la variable avec des villes et quartiers par défaut
var s_a = [
    {ville: "Yaoundé", quartiers: ["Akwa", "Bonapriso", "Ebolowa", "Ngousso"]},
    {ville: "Douala", quartiers: ["Bonaberi", "Deido", "New Bell", "Akwa"]},
    {ville: "Bamenda", quartiers: ["Mankon", "Santa", "Bamessing", "Nkwen"]},
    {ville: "Garoua", quartiers: ["Rego", "Kolofata", "Mandara", "Mougayam"]},
    {ville: "Maroua", quartiers: ["Kousseri", "Mokolo", "Miglad", "Mandara"]}
];

// Affichage du tableau mis à jour
console.log(s_a);

function print_country(country_id) {
    var selectElement = document.getElementById(country_id);
    selectElement.length = 0; // Clear existing options
    selectElement.options[0] = new Option('Sélectionnez une ville', '');
    selectElement.selectedIndex = 0;

    for (var i = 1; i < s_a.length; i++) {
        selectElement.options[selectElement.length] = new Option(s_a[i].ville, s_a[i].ville);
    }
}


function print_state(state_id, state_index) {
    var selectElement = document.getElementById(state_id);
    selectElement.length = 0; // Clear existing options
    selectElement.options[0] = new Option('Sélectionnez un quartier', '');
    selectElement.selectedIndex = 0;

    if (state_index >= 0 && state_index < s_a.length) {
        var quartiers = s_a[state_index].quartiers;
        for (var i = 0; i < quartiers.length; i++) {
            selectElement.options[selectElement.length] = new Option(quartiers[i], quartiers[i]);
        }
    }
}
