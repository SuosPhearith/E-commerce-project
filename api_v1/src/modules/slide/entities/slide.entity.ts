import { Product } from 'src/modules/product/entities/product.entity';
import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Slide {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  title: string;

  @Column()
  image: string;

  @Column()
  color: string;

  @OneToOne(() => Product)
  @JoinColumn()
  product: Product;

  @OneToOne(() => User)
  @JoinColumn()
  updatedBy: User;

  @Column()
  updatedAt: Date;
}
