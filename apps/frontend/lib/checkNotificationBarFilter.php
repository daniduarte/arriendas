<?php

class checkNotificationBarFilter extends sfFilter {

    public function execute($filterChain) {

        $ContextUser = $this->getContext()->getUser();
        if ($this->isFirstCall() && $ContextUser->isAuthenticated()) {

            $userId = $ContextUser->getAttribute('userid');
            $User   = Doctrine_core::getTable("User")->find($userId);

            $UserNotification = Doctrine_Core::getTable('UserNotification')->findBarNotification($userId);

            if ($UserNotification) {
                if ($UserNotification->getNotification()->is_active &&
                    $UserNotification->getNotification()->getAction()->is_active &&
                    $UserNotification->getNotification()->getNotificationType()->is_active) {
                
                    $message = Notification::translator($User->id, $UserNotification->getNotification()->message, $UserNotification->reserve_id);

                    $ContextUser->setAttribute("notificationMessage", $message);
                    $ContextUser->setAttribute("notificationId", $UserNotification->id);

                    if (is_null($UserNotification->getViewedAt())) {
                        $UserNotification->setViewedAt(date("Y-m-d H:i:s"));
                        $UserNotification->save();
                    }
                }                
            }
        }

        $filterChain->execute();
    }
}