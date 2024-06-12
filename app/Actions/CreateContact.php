<?php 

namespace App\Actions;

use App\Models\Attachment;
use App\Models\Contact;

class CreateContact
{
    public static function handle(array $data): Contact 
    {

        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        $files = $data['files'];
        
        foreach ($files as $file) {
            Attachment::create([
                'pathName' => $file->store('attachments'),
                'fileName' => $file->getClientOriginalName(),
                'mimeType' => $file->getClientMimeType(),
                'contact_id' => $contact->id,
            ]);
        }
       
        return $contact->load('attachments');
    }
}