<?php echo '<?php' ?>

namespace <?php echo $this->namespace ?>;

class <?php echo $this->name ?> <?php echo isset($this->extends)?'extends '.$this->extends:''; ?>
{
<?php foreach($this->methods as $method): ?>
<?php $method->generate(); ?>
<?php endforeach; ?>
}
