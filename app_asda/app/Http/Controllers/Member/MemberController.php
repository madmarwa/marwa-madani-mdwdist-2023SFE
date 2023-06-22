<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembersRequest;
use App\Repository\MemberRepositoryInterface;

class MemberController extends Controller
{
    protected $Member;

    public function __construct(MemberRepositoryInterface $Members)
    {
        $this->Member = $Members;
    }
    public function index()
    {
       return  $this->Member->getAllMembers();
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Member->Create_Member();
    }

    public function store(StoreMembersRequest $request)
    {
       return $this->Member->Store_Member($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Members = $this->Member->editMembers($id);
        $genders = $this->Member->GetGender();
        return view('pages.Member.Edit', compact('Members', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Member->UpdateMembers($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Member->DeleteMembers($request);
    }
}
