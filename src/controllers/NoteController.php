<?php

namespace controllers;

use controllers\AbstractController;

use models\Note;
use services\UploadImage;

class NoteController extends AbstractController
{
    static public function add()
    {
        $note = new Note();
        $note->setTitle($_POST['title'])
            ->setSlug(uniqid("note_"))
            ->setContent($_POST['content']);
        if (isset($_FILES['image'])) {
            $note->setImage(UploadImage::upload($_FILES['image']));
            $note->bindValues();
            $note->create();
            header('Location: /notes');
        }
    }

    static public function edit($slug)
    {
        // Get actual data of the note
        $currentNote = new Note();
        $currentNote->find($slug);

        // Compare whit the form data sended
        if ($currentNote->getTitle() != $_POST['title']) {
            $currentNote->setTitle($_POST['title']);
        }
        if ($currentNote->getContent() != $_POST['content']) {
            $currentNote->setContent($_POST['content']);
        }

        if (!empty($_FILES['image'])) {
            if ($currentNote->getImage() != $_FILES['image']['name']) {
                $currentNote->setImage(UploadImage::upload($_FILES['image']));
            }
        }

        // var_dump($currentNote);
        // die();

        $currentNote->bindValues();
        $currentNote->update($slug);
        header('Location: /note?slug=' . $slug);
    }
}
// Don't write any code below this line