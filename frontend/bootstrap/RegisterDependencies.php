<?php
    namespace frontend\bootstrap;

    use yii\mail\MailerInterface;

    class RegisterDependencies implements \yii\base\BootstrapInterface
    {
        public function bootstrap($app)
        {
            $container = \Yii::$container;
            //$app->container->setSingleton('frontend\repositories\UserRepositoryInterface', ['class' => \frontend\repositories\UserRepository::className()]);

            $container->setSingleton(MailerInterface::class, function () use ($app)
            {
                return $app->mailer;
            });

            //$app->container->setSingleton('frontend\services\EmailService');
        }

    }
