<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    //
    function index()
    {
        return view("front.contact");
    }
    function show()
    {
        $messages = Contact::orderBy('state','desc')->get();
        return view("admin.contactmessages", compact('messages'));
    }
    public function update(Request $request, $id)
{
    // Find the message by ID
    $message = Contact::findOrFail($id);

    // Validate the request data if needed
    $request->validate([
        'state' => 'required|in:pending,Done', // Ensure the state is either 'pending' or 'Done'
    ]);

   // dd($message);
    // Update the state of the message
    $message->state = $request->state;

    // Save the changes
    $message->save();

    //dd($message);

//dd($request);
//dd($id);
    return redirect()->back()->with('success', 'Message state updated successfully');
}

    public function sendMessage(Request $request)
    {
        // Validate form data
        $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|max:30',
            'message' => 'required|string|min:10|max:3000',
            'phone' => 'required|string', // Assuming 'phone' is the name of the input field for the phone number
        ]);

        Contact::create($data);
        //dd($data);
        return back()->with('success', 'Data Sent Successfuly');
        //     try {
        //         // Send email

        //         Mail::to('ayas642263@gmail.com')->send(new ContactFormMail($request->all()));

        //         // Log success
        //         Log::info('Contact form email sent successfully.');

        //         // Return success response
        //         return response()->json(['message' => 'Your message has been sent. Thank you!']);
        //     } catch (\Exception $e) {
        //         // Log error
        //         Log::error('Error sending contact form email: ' . $e->getMessage());

        //         // Return error response
        //         return response()->json(['error' => 'An error occurred while sending your message. Please try again later.'], 500);
        //     }
    }
}
