import { Product } from 'src/modules/product/entities/product.entity';
import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToMany,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Category {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  name: string;

  @Column()
  description: Text;

  @OneToOne(() => Category)
  @JoinColumn()
  parentId: Category;

  @Column()
  createdAt: Date;

  @Column()
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  modifiedBy: User;

  @OneToMany(() => Product, (product) => product.category)
  productId: Product[];
}
