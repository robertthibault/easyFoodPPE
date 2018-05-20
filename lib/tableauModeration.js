function debut() {
    document.getElementById("formulaireCommentaireResto").style.display="none";
    document.getElementById("formulaireCommentaireSite").style.display="none";
    document.getElementById("formulairePlats").style.display="none";

}

function tabCommentaire(){
    document.getElementById("formulaireCommentaireResto").style.display="block";
    document.getElementById("formulaireCommentaireSite").style.display="block";
    document.getElementById("formulairePlats").style.display="none";
}

function tabPlat(){
    document.getElementById("formulaireCommentaireResto").style.display="none";
    document.getElementById("formulaireCommentaireSite").style.display="none";
    document.getElementById("formulairePlats").style.display="block";
}