<?php

namespace App\Repository;

use App\Entity\Notation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\From;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Notation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notation[]    findAll()
 * @method Notation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Notation::class);
    }

/**
 * @return Notation[] Returns an array of Notation objects
 */
	public function findByNotation($value) // Typage important… :array :int :string…
	{
		return var_dump($this->createQueryBuilder('notation')
			->addSelect('AVG(notation.notation)')
			->andWhere('notation.notation = :val') // Cela devrait marcher mais cela ne marche pas !!
			->setParameter('val', $value)
			->getQuery()
			->getResult())
		;
		// Ti peut utiliser la valeur de ID de la fonction show et appellé findByNotation dans Index ?
	}

//    /**
//     * @return Notation[] Returns an array of Notation objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Notation
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
