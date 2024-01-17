import { ProductSizeColor } from 'src/modules/product/entities/product-size-color.entity';
import {
  Column,
  Entity,
  ManyToMany,
  ManyToOne,
  OneToMany,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Size {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  name: string;

  @Column()
  description: Text;

  @ManyToOne(
    () => ProductSizeColor,
    (productSizeColor) => productSizeColor.sizes,
  )
  productSizeColor: ProductSizeColor;
}
