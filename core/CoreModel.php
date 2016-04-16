<?php
namespace core;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use config\DBConfig;

Class CoreModel {
	private $entityManager;
	
	function __construct(){
		$c=new DBConfig;
		$paths = array(__DIR__."/src");
		$isDevMode = true;

		$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		
		$conn = array(
		    'driver' => $c->getdbConf('driver'),
		    'user' => $c->getdbConf('user'),
		    'password' => $c->getdbConf('password'),
		    'dbname' => $c->getdbConf('dbname')
		);
		$this->entityManager = EntityManager::create($conn, $config);
	}

	public function save($object,$return=true){
		$this->entityManager->persist($object);
		$this->entityManager->flush();
		if($return){
			return $object->getId();
		}else{
			echo "Created Entry with ID " . $object->getId() . "\n";
		}
	}

	public function getAll($repo){
		return $this->entityManager->getRepository('src\\'.$repo)->findAll();
	}

	public function getId($repo,$id){
		return $this->entityManager->getRepository('src\\'.$repo)->find($id);
	}
}

/*query builder
$result = $em->getRepository("Orders")->createQueryBuilder('o')
   ->where('o.OrderEmail = :email')
   ->andWhere('o.Product LIKE :product')
   ->setParameter('email', 'some@mail.com')
   ->setParameter('product', 'My Products%')
   ->getQuery()
   ->getResult();
*/