To get started run:
```
$ npm install
$ gulp init
// grab media directory from source (whereever it is living now)
$ gulp thumbnail
```

---

*** Please Note ***
Change `head.php` and `footer-scripts` in `src/views/partials` because 
``` $ gulp build ```
does a cachebust on these files and will delete your changes if you've made them in `views/partials`

---

All thumbnails are generated from larger JPG's with `-thumb.png` by running:
```$ gulp thumbnail```
It will say it is finish but allow it to run until you see a new terminal prompt

---

Categories are pulled from the subdirectories of `./media`
Categories thumbnails are generated from category.jpg

---

Files need to be placed in year directories or else they will be ignored

Item-list.php pulls non-thumbnailed file names so that it can check the extension of the file name and have the correct on-hover effect. This can mean you get an image error when there is no generated PNG thumbnail for the file.

---

*** Use the -n flag first on any of these commands to make sure you are doing what you want to the file names ***
```$ find ./media -exec rename -n 's|(.*)|\L$1|g' {} +```

All media files need to be lower case use this in your mac terminal in the portfolio directory to do this
```$ find ./media -exec rename -f 's|(.*)|\L$1|g' {} +```

No urlencoding/decoding is done so this may also be helpful
```
// find any special characters and replace them with dashes
$ find ./media -exec rename 's|[-()_]|-|g' {} +
// remove any repeating dashes
$ find ./media -exec rename 's|-+|-|g' {} +
```

---