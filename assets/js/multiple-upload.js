let fileInput = document.querySelector('.file-input');
let fileList = [];

// Ajout multiple
if(fileInput){
    fileInput.addEventListener('change', function (event) {
            const collectionHolder = document.querySelector('.files');

            fileList = [];
            for (let i = 0; i < fileInput.files.length; i++) {
                // fileList.push(fileInput.files[i]);
                const item = document.createElement('li');
                // item.classList.add('hidden')
                item.classList.add('li-file-input')

                item.innerHTML = collectionHolder
                    .dataset
                    .prototype
                    .replace(
                        /__name__/g,
                        collectionHolder.dataset.index
                    );


                collectionHolder.appendChild(item);
                let input = item.querySelector("input[type='file']")
                console.log(input.files)
                let dataTransfer = new DataTransfer();
                dataTransfer.items.add(fileInput.files[i])
                input.files = dataTransfer.files
                collectionHolder.dataset.index++;
            }
        }
    )
}


// Suppression
const img_preview = document.querySelectorAll("[aria-view]")
const removeImage = (e) => {
    e.preventDefault()
    const target_form_image = document.querySelector('#article_attachment_' + e.currentTarget.dataset.id)
    if(target_form_image)
    {
        target_form_image.remove()
        e.currentTarget.remove()
    }
}
img_preview.forEach(element => {
    element.addEventListener('click',removeImage)
})
