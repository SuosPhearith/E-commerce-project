import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class Header {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  phone: string;

  @Column()
  email: string;

  @Column()
  location: string;

  @Column()
  locationUrl: string;

  @Column()
  facebookUrl: string;

  @Column()
  instagramUrl: string;

  @Column()
  twitterUrl: string;

  @Column()
  logoImage: string;

  @Column()
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  updatedBy: User;
}
