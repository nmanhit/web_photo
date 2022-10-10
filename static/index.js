const choosePhotoElms = document.getElementsByClassName("icon-upload-file");
if(choosePhotoElms.length > 0) {
    const choosePhotoElm = choosePhotoElms[0];
    const fileInputElm = document.getElementById("photo");

    choosePhotoElm.addEventListener('click', () => {
        fileInputElm.click();
    });

    fileInputElm.addEventListener("change", (event) => {
        const file = fileInputElm.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = async (event) => {
                document.getElementById('img-preview').setAttribute('src', event.target.result)
            }
            reader.readAsDataURL(file)
        }
    });
}
