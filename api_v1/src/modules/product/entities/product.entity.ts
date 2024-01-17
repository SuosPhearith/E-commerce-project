import { Category } from 'src/modules/category/entities/category.entity';
import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  ManyToOne,
  OneToMany,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';
import { ProductSizeColor } from './product-size-color.entity';
import { ProductImage } from './product-image.entity';

@Entity()
export class Product {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  name: string;

  @Column()
  price: number;

  @Column()
  description: Text;

  @Column()
  sku: string;

  @ManyToOne(() => Category, (category) => category.productId)
  category: Category;

  @Column()
  discount: number;

  @Column()
  tags: string;

  @Column()
  additionalInformation: Text;

  @Column()
  averageReview: number;

  @Column({ type: 'timestamptz', default: () => 'CURRENT_TIMESTAMP' })
  createdAt: Date;

  @Column({ type: 'timestamptz', default: () => 'CURRENT_TIMESTAMP' })
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  modifiedBy: User;

  @ManyToOne(
    () => ProductSizeColor,
    (productSizeColor) => productSizeColor.products,
  )
  productSizeColor: ProductSizeColor;

  @OneToMany(() => ProductImage, (productImage) => productImage.productId)
  productImages: ProductImage[];
}
