<?php

use yii\db\Migration;

/**
 * Class m201022_113458_create_post_permission_to_role
 */
class m201022_113458_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        //get role
        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superAdmin = $auth->getRole('super-admin');
        //get permission
        $listpost = $auth->getpermission('post-index');
        $createpost = $auth->getpermission('post-create');
        $updatepost = $auth->getpermission('post-update');
        $updatepos = $auth->getpermission('post-delete');
        $viewpost = $auth->getpermission('post-view');

        //assign
        $auth->addChild($author,$createPost);
        $auth->addChild($author,$listPost);
        $auth->addChild($author,$viewPost);
        $auth->addChild($author,$viewPost);

        $auth->addChild($admin,$author);

        $auth->addChild($superAdmin,$admin);
        $auth->addChild($superAdmin,$deletePost);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201022_113458_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_113458_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }
    */
}
