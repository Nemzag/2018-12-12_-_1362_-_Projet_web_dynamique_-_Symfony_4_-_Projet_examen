<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, Comment::class);
	}

	public function findCommentsNotations()
	{
		/*
		$entityManager = $this->getEntityManager();

		$query = $entityManager->createQuery(
			'SELECT comment.comment, comment.date_added, notation.notation, user.image, user.username, comment.id
			   FROM AppBundle\Entity\Comment
          LEFT JOIN product ON comment.product_id = product.id
		  LEFT JOIN user ON user.id = product.user_id
          LEFT JOIN notation ON product.id = notation.product_id;'
		);

		return $query->getResult();
		*/
		$dql = 'SELECT comment.comment, comment.date_added, notation.notation, user.image, user.username, comment.id FROM App:Comment LEFT JOIN App:Product ON comment.product_id = product.id LEFT JOIN user ON user.id = product.user_id LEFT JOIN notation ON product.id = notation.product_id;';

		$query = $this->getEntityManager()->createQuery($dql);
		return $query->execute();
	}


//    /**
//     * @return Comment[] Returns an array of Comment objects
//     */
	/*
	public function findByExampleField($value)
	{
		return $this->createQueryBuilder('c')
			->andWhere('c.exampleField = :val')
			->setParameter('val', $value)
			->orderBy('c.id', 'ASC')
			->setMaxResults(10)
			->getQuery()
			->getResult()
		;
	}
	*/

	/*
	public function findOneBySomeField($value): ?Comment
	{
		return $this->createQueryBuilder('c')
			->andWhere('c.exampleField = :val')
			->setParameter('val', $value)
			->getQuery()
			->getOneOrNullResult()
		;
	}
	*/
}
