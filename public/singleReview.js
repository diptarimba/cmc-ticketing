        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-ktm').on('change', function () {
            imagesPreview(this, 'div.gallery-ktm');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-ktm').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-ktm")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });

        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-photo').on('change', function () {
            imagesPreview(this, 'div.gallery-photo');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-photo').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-photo")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });

        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-twibbon').on('change', function () {
            imagesPreview(this, 'div.gallery-twibbon');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-twibbon').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-twibbon")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });

        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-cmc').on('change', function () {
            imagesPreview(this, 'div.gallery-cmc');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-cmc').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-cmc")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });

        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-sekoin').on('change', function () {
            imagesPreview(this, 'div.gallery-sekoin');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-sekoin').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-sekoin")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });

        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add-payment').on('change', function () {
            imagesPreview(this, 'div.gallery-payment');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add-payment').on('click', function () {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery-payment")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });
