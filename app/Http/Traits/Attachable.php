<?php

namespace App\Http\Traits;

use App\Http\Requests\AttachmentRequest;

trait Attachable
{

    /**
     * return must be either news, packages, or destinations
     *
     * @return string
     */
    abstract public function setAttachmentType() : string;

    private function isTypeQualified($type)
    {
        if (! in_array($type, ['news', 'packages', 'destinations'])) {
            throw new \Exception('Attachment Type must be either news, packages, or destinations');
        }

        return true;
    }

    public function attach(AttachmentRequest $request)
    {
        $this->isTypeQualified($this->setAttachmentType());

        $name = $request['image']->getClientOriginalName();
        $request['image']->storeAs('public/'.$this->setAttachmentType().'/attachment', $name);

        $path = "storage/".$this->setAttachmentType()."/attachment/{$name}";

        return response()->json([
            "url" => asset($path),
        ]);
    }
}
